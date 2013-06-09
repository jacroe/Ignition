<?php /* Smarty version Smarty-3.1.11, created on 2013-06-03 17:39:21
         compiled from "/home/jacob/www/ignition-v2/inc/templates/post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195986363519f0331b55035-99163221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3774c5f4bc3b7ac95a21432a2d6a466ccd01e155' => 
    array (
      0 => '/home/jacob/www/ignition-v2/inc/templates/post.tpl',
      1 => 1370276954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195986363519f0331b55035-99163221',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_519f0331c1fd52_50150970',
  'variables' => 
  array (
    'post_article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519f0331c1fd52_50150970')) {function content_519f0331c1fd52_50150970($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_markdown')) include '/home/jacob/www/ignition-v2/lib/smarty/plugins/modifier.markdown.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<article>
<?php echo smarty_modifier_markdown($_smarty_tpl->tpl_vars['post_article']->value);?>

</article>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>