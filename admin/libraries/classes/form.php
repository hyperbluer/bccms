<?php
/**
 * Form.class.php 表单类
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-06-26
 */
defined('IN_BC') or exit("Access Denied!");

class Form
{
    public static function getContentModelFiledHtml(array $data)
    {
        $type = $data['type']; //int text textarea editor box image number datetime colorpicker
        $name = 'extra['.$data['alias'].']';
        $id = 'input_'.$data['alias'];
        $value = $data['value'];
		
		if ($type == 'datetime' && $value == '0000-00-00 00:00:00')
		{
			$value = '';
		}
		
        if (in_array($type, array('int', 'text')))
        {
            return self::input($name, $id, $value);
        }
        else if ($type == 'box')
        {
            $method = $data['attr']['type'];
            if (method_exists(__CLASS__, $method))
            {
                $options = array();
                if (isset($data['attr']['options']) && !empty($data['attr']['options']))
                {
                    $optionsArray = explode("\r\n", $data['attr']['options']);
                    $options = array();
                    foreach ($optionsArray as $k => $v)
                    {
                        if (stripos($v, '|') !== false)
                        {
                            $optionArray = explode('|', $v);
                            if (isset($optionArray[1]))
                            {
                                $options[$optionArray[1]] = $optionArray[0];
                            }
                            else
                            {
                                $options[] = $optionArray[0];
                            }
                        }
                        else
                        {
                            $options[] = $v;
                        }

                    }
                }
				
				if (in_array($data['attr']['type'], array('checkbox', 'multiple')))
				{
					$value = explode(',', $value);
				}

                return self::$method($name, $id, $value, $options);
            }
            else
            {
                return NULL;
            }
        }
        else if (method_exists(__CLASS__, $type))
        {
            return self::$type($name, $id, $value);
        }
        else
        {
            return NUll;
        }
    }

    public static function input($name, $id = '', $value = '', $type = 'text', $class = '')
    {
        return '<input type="'.$type.'" name="'.$name.'" value="'.$value.'" id="'.$id.'" class="m-wrap '.$class.'"/>';
    }

    public static function textarea($name, $id = '', $value = '', $class = 'large')
    {
        $html = '<textarea name="'.$name.'" id="'.$id.'" class="m-wrap '.$class.'">'.$value.'</textarea>';

        return $html;
    }

    public static function editor($name,  $id = '', $value = '', $class = 'editor')
    {
        $html = self::textarea($name, $id, $value, $class);

        return $html;
    }

    public static function image($name,  $id = '', $value = '', $class = '')
    {
        $html = '';
        if ($value)
        {
            $html = '<div class="fileupload-new thumbnail" style="width: 200px;">
                <img src="'.UPLOAD_PATH.'images/'.$value.'" alt="" style="width: 200px;">
            </div><br />';
        }
        $html .= '<div class="fileupload fileupload-new" data-provides="fileupload">
					<div class="input-append">
						<div class="uneditable-input">
							<i class="icon-file fileupload-exists"></i>
							<span class="fileupload-preview"></span>
						</div>
						<span class="btn btn-file">
						<span class="fileupload-new">选择文件</span>
						<span class="fileupload-exists">更换</span>
						    <input type="file" name="'.$name.'" id="'.$id.'" class="default" />
						</span>
						<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">移除</a>
					</div>
				</div>';

        return $html;
    }

    public static function datetime($name, $id = '', $value = '', $language = 'zh-CN')
    {
        $html = '<div class="input-append date form_advance_datetime" data-date-language="'.$language.'">
					<input size="16" name="'.$name.'" id="'.$id.'" value="'.$value.'" type="text" readonly class="m-wrap">
					<span class="add-on"><i class="icon-calendar"></i></span>
				</div>';

        return $html;
    }

    public static function colorpicker($name, $id = '', $value = '', $class = 'colorpicker-default small')
    {
        $html = self::input($name, $id, $value, 'text', $class);

        return $html;
    }

    public static function select($name, $id = '', $value = '', $options = array(), $multiple = false)
    {
        $html = '<select class="span6 m-wrap" name="'.$name.'" id="'.$id.'">';
        $html .= '<option value="">请选择...</option>';
        foreach ($options as $k => $v)
        {
            $selected = ($value == $k) ? 'selected="selected"' : '';
            $html .= '<option value="'.$k.'" '.$selected.'>'.$v.'</option>';
        }
		$html .= '</select>';

        return $html;
    }

    public static function multiple($name, $id = '', $value = array(), $options = array())
    {
        $html = '<select class="span6 m-wrap" multiple="multiple" name="'.$name.'[]" id="'.$id.'">';
        foreach ($options as $k => $v)
        {
            $selected = in_array($k, $value) ? 'selected="selected"' : '';
            $html .= '<option value="'.$k.'" '.$selected.'>'.$v.'</option>';
        }
		$html .= '</select>';

        return $html;
    }

    public static function radio($name, $id = '', $value = '', $options = array())
    {
        $html = '';
        foreach ($options as $k => $v)
        {
            $checked = ($value == $k) ? 'checked="checked"' : '';
            $html .= '<label class="radio"><input type="radio" name="'.$name.'" id="'.$id.'_'.$k.'" value="'.$k.'" '.$checked.'/>'.$v.'</label>';
        }
        
        return $html;
    }

    public static function checkbox($name, $id = '', $value = array(), $options = array())
    {
        $html = '';
        foreach ($options as $k => $v)
        {
            $checked = in_array($k, $value) ? 'checked="checked"' : '';
            $html .= '<label class="checkbox"><input type="checkbox" name="'.$name.'[]" id="'.$id.'_'.$k.'" value="'.$k.'" '.$checked.'/>'.$v.'</label>';
        }

        return $html;
    }
}