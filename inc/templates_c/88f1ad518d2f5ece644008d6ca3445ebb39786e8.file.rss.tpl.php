<?php /* Smarty version Smarty-3.1.11, created on 2013-06-09 15:38:02
         compiled from "/home/jacob/www/ignition-v2/inc/templates/rss.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155140179651b4433c347671-16270074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88f1ad518d2f5ece644008d6ca3445ebb39786e8' => 
    array (
      0 => '/home/jacob/www/ignition-v2/inc/templates/rss.tpl',
      1 => 1370810268,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155140179651b4433c347671-16270074',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51b4433c702945_70165845',
  'variables' => 
  array (
    'blog_url' => 0,
    'blog_title' => 0,
    'blog_subtitle' => 0,
    'posts' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b4433c702945_70165845')) {function content_51b4433c702945_70165845($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_markdown')) include '/home/jacob/www/ignition-v2/lib/smarty/plugins/modifier.markdown.php';
?><?php echo '<?xml';?> version="1.0" encoding="UTF-8"<?php echo '?>';?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<atom:link href="<?php echo $_smarty_tpl->tpl_vars['blog_url']->value;?>
?p=feed" rel="self" type="application/rss+xml" />
	<title><?php echo $_smarty_tpl->tpl_vars['blog_title']->value;?>
</title>
	<link><?php echo $_smarty_tpl->tpl_vars['blog_url']->value;?>
</link>
	<description><?php echo $_smarty_tpl->tpl_vars['blog_subtitle']->value;?>
</description>
	<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
	<item>
		<title><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</title>
		<link><?php echo $_smarty_tpl->tpl_vars['blog_url']->value;?>
?id=<?php echo $_smarty_tpl->tpl_vars['post']->value['slug'];?>
</link>
		<guid><?php echo $_smarty_tpl->tpl_vars['blog_url']->value;?>
?id=<?php echo $_smarty_tpl->tpl_vars['post']->value['slug'];?>
</guid>
		<pubDate><?php echo $_smarty_tpl->tpl_vars['post']->value['date'];?>
</pubDate>
		<description><![CDATA[<?php echo smarty_modifier_markdown($_smarty_tpl->tpl_vars['post']->value['article']);?>
]]></description>
	</item>
	<?php } ?>
</channel>
</rss><?php }} ?>