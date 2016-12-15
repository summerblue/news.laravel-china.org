<?php
// 如：db:seed 或者 清空数据库命令的地方调用
function insanity_check()
{
    if (App::environment('production')) {
        exit('别傻了? 这是线上环境呀。');
    }
}

function admin_link($title, $path, $id = '')
{
    return '<a href="'.admin_url($path, $id).'" target="_blank">' . $title . '</a>';
}

function admin_url($path, $id = '')
{
    return env('APP_URL') . "/admin/$path" . ($id ? '/'.$id : '');
}

function admin_enum_style_output($value, $reverse = false)
{
    if ($reverse) {
        $class = ($value === true || $value == 'yes') ? 'danger' : 'success';
    } else {
        $class = ($value === true || $value == 'yes') ? 'success' : 'danger';
    }

    return '<span class="label bg-'.$class.'">'.$value.'</span>';
}


function make_excerpt($value)
{
    $excerpt = trim(preg_replace('/\s\s+/', ' ', strip_tags($value)));
    return str_limit($excerpt, 200);
}

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

function markdown($text) {
	return (new ParsedownExtra)->setBreaksEnabled(true)->text($text);
}

function cdn($filepath)
{
    if (config('app.url_static')) {
        return config('app.url_static') . $filepath;
    } else {
        return config('app.url') . $filepath;
    }
}

function img_crop($filepath, $width = 0, $height = 0)
{
    return $filepath . "?imageView2/1/w/{$width}/h/{$height}";
}
