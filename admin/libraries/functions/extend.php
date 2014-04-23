<?php
/**
 *  Extend.php 自定义扩展函数库
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-26
 */

if (!function_exists('_url'))
{
    /**
     * 统一URL路径
     *
     * @param string $path  系统内部路径采取 module/controller/action
     * @param array $params 传递的参数键值对
     * @param bool $internal 是否为系统内部路径，若$path为外部路径，请设置为false
     * @param array $defaultParams 默认加载的参数
     * @return null|string
     */
    function _url($path = '', array $params = array(), $internal = true, $defaultParams = array('menu_id', 'hash', 'token'))
    {
        if (empty($path))
        {
            $url = Url::getCurrentUrl();
        }
        elseif ($internal === true)
        {
            if ($path == '#') return $path;

            $url = BC::config('root_path');
            $path = ltrim($path,'/');
        }
        else
        {
            $url = '';
        }

        if (($position = strpos($path, '?')) !== false)
        {
            $pathParamsString = substr($path, $position+1, strlen($path));
            parse_str($pathParamsString, $pathParams);
            $params = ArrayConvert::mergeArray($pathParams, $params);
            $url .= substr($path, 0, $position);
        }
        else
        {
            $url .= $path;
        }

        foreach ($defaultParams as $param)
        {
            if (!isset($params[$param]) && BC::loader()->request->get->has($param))
                $params[$param] = BC::loader()->request->get->get($param);
        }

        count($params) && $url .= '?'.http_build_query($params);

        return $url;
    }
}