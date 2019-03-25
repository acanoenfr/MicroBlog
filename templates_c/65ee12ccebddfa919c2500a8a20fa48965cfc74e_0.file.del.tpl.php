<?php
/* Smarty version 3.1.33, created on 2019-01-16 17:28:06
  from 'C:\Users\alexc\Desktop\microblog\templates\del.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c3f5b961d3f63_98797081',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '65ee12ccebddfa919c2500a8a20fa48965cfc74e' => 
    array (
      0 => 'C:\\Users\\alexc\\Desktop\\microblog\\templates\\del.tpl',
      1 => 1547656079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c3f5b961d3f63_98797081 (Smarty_Internal_Template $_smarty_tpl) {
?><section>
            <div class="container">
                <div class="row">
                    <?php if (isset($_smarty_tpl->tpl_vars['flash']->value)) {?>
                        <div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['flash']->value[0];?>
">
                            <span class="text-muted"><?php echo $_smarty_tpl->tpl_vars['flash']->value[1];?>
</span>
                        </div>
                    <?php }?>
                    <form method="post" action="process/del.php">
                        <div class="alert alert-warning">
                            <span class="text-muted">Êtes-vous sûr de supprimer ce message (ID=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
) ?</span>
                        </div>
                        <div class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                            <a href="index.php" class="btn btn-primary btn-lg">Non, conserver</a>
                            <button type="submit" class="btn btn-success btn-lg">Oui, supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </section><?php }
}
