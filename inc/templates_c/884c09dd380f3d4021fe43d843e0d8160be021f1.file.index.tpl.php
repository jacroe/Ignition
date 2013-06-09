<?php /* Smarty version Smarty-3.1.11, created on 2013-06-09 04:44:25
         compiled from "/home/jacob/www/ignition-v2/inc/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146331905519efeef931431-75910539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '884c09dd380f3d4021fe43d843e0d8160be021f1' => 
    array (
      0 => '/home/jacob/www/ignition-v2/inc/templates/index.tpl',
      1 => 1370771051,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146331905519efeef931431-75910539',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_519efeefb0f958_99533296',
  'variables' => 
  array (
    'posts' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519efeefb0f958_99533296')) {function content_519efeefb0f958_99533296($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_markdown')) include '/home/jacob/www/ignition-v2/lib/smarty/plugins/modifier.markdown.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<article>
<?php if ($_smarty_tpl->tpl_vars['posts']->value){?>
<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
<h1><a href="?id=<?php echo $_smarty_tpl->tpl_vars['post']->value['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</a></h1>
<p class=byline><?php echo $_smarty_tpl->tpl_vars['post']->value['author'];?>
 <span style="color:#000;">|</span> <a title="<?php echo $_smarty_tpl->tpl_vars['post']->value['date'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['timeAgo'];?>
</a> <span style="color:#000;">|</span> <?php echo $_smarty_tpl->tpl_vars['post']->value['loc'];?>
</p>
<?php echo smarty_modifier_markdown($_smarty_tpl->tpl_vars['post']->value['article']);?>

<?php } ?>
<?php }else{ ?>
<?php echo $_smarty_tpl->getSubTemplate ("empty.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
</article>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>