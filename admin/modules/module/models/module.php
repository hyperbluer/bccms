<?php
/**
 * language.php 模型管理模型类
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-17
 */

defined('IN_BC') or exit("Access Denied!");

class Model_Module extends App_Model_Admin
{
    
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'modules';
    }

    public function getSysModules()
    {
        return array('config', 'index', 'language', 'menu', 'module', 'administrator', 'role', 'site', 'category', 'content', 'model');
    }

    public function getConfig($module = '')
    {
        $config = array();
        if ($module)
        {
            $configFile = APP_MOD_PATH.$module.DS.'etc'.DS.'config.php';
            File::isFile($configFile) && $config[$module] = include $configFile;
        }
        else
        {
            $moduleList = File::getDirTree(APP_MOD_PATH, 0, array(), 1);
            foreach ($moduleList as $v)
            {
                $configFile = $v['dir'].'etc'.DS.'config.php';
                File::isFile($configFile) && $config[$v['name']] = include $configFile;
            }
        }

        return $config;

    }

    public function saveConfig($module, $newConfig = array()){
        $configFile = APP_MOD_PATH.$module.DS.'etc'.DS.'config.php';

        if (File::isFile($configFile))
        {
            $config = include $configFile;
            $config = array_merge($config, $newConfig);
        }
        else
        {
            $config = $newConfig;
        }

        $fileClass = new File($configFile, 'w');
        $content = var_export($config, true);
        $content = "<?php \r\nreturn " . $content . ';';
	    if ($fileClass->write($content))
        {
            return true;
        }

        return false;
    }

    public function getActionList($module = '')
    {
        $moduleList = $this->getConfig($module);

        $controllerList = array();
        foreach($moduleList as $module => $moduleItem)
        {
            $controllersPath = APP_MOD_PATH.$module.DS.'controllers'.DS;
            $controllersFileList = File::listDir($controllersPath, 'php');

            foreach ($controllersFileList as $controllerPath)
            {
                $baseName = File::getBaseName($controllerPath, '.php');
                if ($baseName == 'login') continue;

                $controller = 'Controller_'.ucfirst($module).'_'.ucfirst($baseName);
                if (!class_exists($controller, false))
                {
                    @include_once $controllerPath;
                }
                $methods = get_class_methods($controller);
                if(($key = array_search('__construct', $methods)) !== false)
                    unset($methods[$key]);
                $controllerList[$module][$baseName] = $methods;
            }
        }

        return $controllerList;
    }

    public function create($module, $config)
    {
        $codePath = APP_MOD_PATH.'module'.DS.'etc'.DS.'code'.DS;
        $modulePath = APP_MOD_PATH.$module.DS;
        $moduleTplPath = APP_TPL_PATH.BC::config('tpl').DS.$module.DS;
        $moduleAssetsPath = BASE_PATH.'assets'.DS.'admin'.DS.$module.DS;
        //创建模块文件夹
        !File::isDir($modulePath) && File::mkDir($modulePath);
        //复制模块文件夹
        File::cpDir($codePath.'module', $modulePath);
        $this->saveConfig($module, $config); //保存配置
        //复制模板文件夹
        File::mkDir($moduleTplPath);
        File::cpDir($codePath.'tpl', $moduleTplPath);
        //复制静态文件文件夹
        //File::mkDir($moduleAssetsPath);
        //File::cpDir($codePath.'assets', $moduleAssetsPath);

        $search = array(
            '__MODULE__',
            '__UCFIRST_MODULE__',
            '__CONFIG_NAME__',
            '__CONFIG_TEAM__',
            '__CONFIG_EMAIL__',
            '__CONFIG_VERSION__',
            '__CONFIG_WEBSITE__',
            '__CONFIG_ADD_TIME__',
        );
        $replace = array(
            $module,
            ucfirst($module),
            $config['name'],
            $config['team'],
            $config['email'],
            $config['version'],
            $config['website'],
            Date::format(null, $config['add_time']),
        );

        $moduleFileList = File::listDir($modulePath);
        $moduleTplFileList = File::listDir($moduleTplPath);
        foreach ($moduleTplFileList as $file)
        {
            $moduleFileList[] = $file;
        }
        foreach($moduleFileList as $file)
        {
            if (!File::isFile($file)) continue;
            //替换标签
            $fileClass = new File($file, 'r+');
            $content = $fileClass->read();
            $content = str_replace($search, $replace, $content);
            $fileClass->truncate();
            $fileClass->write($content);
            $fileClass->close();

            //替换模型文件文件名
            $baseName = File::getBaseName($file, '.php');
            if ($baseName == '__MODULE__')
            {
                $newFile = str_replace('__MODULE__', $module, $file);
                File::rename($file, $newFile);
            }
        }

        return true;
    }
}