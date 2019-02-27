<?php
/* Smarty version 3.1.33, created on 2019-01-30 15:56:05
  from 'C:\Users\alexc\Desktop\LP DIM\Cours PHP-MySQL\microblog\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c51c91555aad1_13101512',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '034b95db967fcbbb2bb6e3ee73007b14451462be' => 
    array (
      0 => 'C:\\Users\\alexc\\Desktop\\LP DIM\\Cours PHP-MySQL\\microblog\\templates\\index.tpl',
      1 => 1548863760,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c51c91555aad1_13101512 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\alexc\\Desktop\\LPDIM\\CoursPHP-MySQL\\microblog\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<section>
                    <div class="container">
                        <div class="row">
                                <?php if (isset($_smarty_tpl->tpl_vars['flash']->value)) {?>
                                    <div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['flash']->value[0];?>
">
                                        <span class="text-muted"><?php echo $_smarty_tpl->tpl_vars['flash']->value[1];?>
</span>
                                    </div>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['auth']->value) {?>
                                    <form method="post" action="process/add.php" enctype="multipart/form-data">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <textarea id="message" name="message" class="form-control" placeholder="Message"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                                        </div>                        
                                    </form>
                                <?php }?>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['post']->value) {
?>
                                    <blockquote>
                                        <p><?php echo $_smarty_tpl->tpl_vars['post']->value['content'];?>
</p>
                                        <small class="text-muted">Nombres de vote : <?php echo $_smarty_tpl->tpl_vars['post']->value['likes'];?>
 <a class="btn-like" href="#" data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
">Voter</a></small>
                                        <footer><?php echo $_smarty_tpl->tpl_vars['post']->value['username'];?>
 le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['created_at'],"%d/%m/%Y");?>
 à <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['created_at'],"%H:%m");?>
 <?php if ($_smarty_tpl->tpl_vars['auth']->value) {?><a href="mod.php?id=<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
">Modifier</a> <a href="del.php?id=<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
">Supprimer</a><?php }?></footer>
                                    </blockquote>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>

                            <!-- Pagination -->
                            <nav>
                                <ul class="pagination pagination-lg">
                                    <li class="<?php echo $_smarty_tpl->tpl_vars['prevLink']->value;?>
"><a href="?p=<?php echo $_smarty_tpl->tpl_vars['prev']->value;?>
">&laquo;</a></li>
                                        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['pages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                            <li class="<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
"><a href="?p=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                                        <?php }
}
?>
                                    <li class="<?php echo $_smarty_tpl->tpl_vars['nextLink']->value;?>
"><a href="?p=<?php echo $_smarty_tpl->tpl_vars['next']->value;?>
">&raquo;</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </section><?php }
}
