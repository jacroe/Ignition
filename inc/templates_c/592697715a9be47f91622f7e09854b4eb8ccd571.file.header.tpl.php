<?php /* Smarty version Smarty-3.1.11, created on 2013-06-09 04:01:06
         compiled from "/home/jacob/www/ignition-v2/inc/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1735446917519f0352f0a747-12514859%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '592697715a9be47f91622f7e09854b4eb8ccd571' => 
    array (
      0 => '/home/jacob/www/ignition-v2/inc/templates/header.tpl',
      1 => 1370768462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1735446917519f0352f0a747-12514859',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_519f0353111320_17159089',
  'variables' => 
  array (
    'post_title' => 0,
    'blog_title' => 0,
    'post_author' => 0,
    'post_slug' => 0,
    'post_date' => 0,
    'post_timeAgo' => 0,
    'post_loc' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519f0353111320_17159089')) {function content_519f0353111320_17159089($_smarty_tpl) {?><!DOCTYPE html>
<html lang=en>
<head>
<meta charset="utf-8">
<title><?php if ($_smarty_tpl->tpl_vars['post_title']->value){?><?php echo $_smarty_tpl->tpl_vars['post_title']->value;?>
 | <?php }?><?php echo $_smarty_tpl->tpl_vars['blog_title']->value;?>
</title>
<link href='http://fonts.googleapis.com/css?family=Bevan' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Cardo' rel='stylesheet' type='text/css'>
<link href=inc/css/styles.css rel=stylesheet type=text/css />
<link rel=alternate type=application/rss+xml title="RSS Feed" href="?p=feed" />
</head>
<body>
<header>
<?php if ($_smarty_tpl->tpl_vars['post_title']->value){?><h1 id=title><a href=index.php>&larr; <?php echo $_smarty_tpl->tpl_vars['blog_title']->value;?>
</a></h1>
<h1><?php echo $_smarty_tpl->tpl_vars['post_title']->value;?>
</h1>
<?php }else{ ?><h1><?php echo $_smarty_tpl->tpl_vars['blog_title']->value;?>
</h1>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['post_author']->value){?>
<p class=byline><?php echo $_smarty_tpl->tpl_vars['post_author']->value;?>
 <span style="color:#000;">|</span> <a href="?id=<?php echo $_smarty_tpl->tpl_vars['post_slug']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['post_date']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['post_timeAgo']->value;?>
 ago</a> <span style="color:#000;">|</span> <?php echo $_smarty_tpl->tpl_vars['post_loc']->value;?>
</p>
<?php }?>
</header><?php }} ?>