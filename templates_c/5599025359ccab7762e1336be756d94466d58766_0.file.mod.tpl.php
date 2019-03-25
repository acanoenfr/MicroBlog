<?php
/* Smarty version 3.1.33, created on 2019-02-27 13:45:50
  from 'C:\Users\alexc\Documents\LP DIM\Cours PHP-MySQL\microblog\templates\mod.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c76867e60b543_77472003',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5599025359ccab7762e1336be756d94466d58766' => 
    array (
      0 => 'C:\\Users\\alexc\\Documents\\LP DIM\\Cours PHP-MySQL\\microblog\\templates\\mod.tpl',
      1 => 1547656052,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c76867e60b543_77472003 (Smarty_Internal_Template $_smarty_tpl) {
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
                    <form method="post" action="process/mod.php">
                        <div class="col-sm-10">  
                            <div class="form-group">
                                <textarea id="message" name="message" class="form-control" placeholder="Message"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</textarea>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                            <button type="submit" class="btn btn-success btn-lg">Modifier</button>
                        </div>                        
                    </form>
                </div>
            </div>
        </section><?php }
}
