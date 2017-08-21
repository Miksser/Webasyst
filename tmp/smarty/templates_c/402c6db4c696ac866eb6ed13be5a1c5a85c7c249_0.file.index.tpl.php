<?php
/* Smarty version 3.1.30, created on 2017-08-21 12:17:12
  from "/var/www/Webasyst/views/default/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_599aa5183af634_64579017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '402c6db4c696ac866eb6ed13be5a1c5a85c7c249' => 
    array (
      0 => '/var/www/Webasyst/views/default/index.tpl',
      1 => 1503307031,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_599aa5183af634_64579017 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="form">
    <div class="tab-content">
        <div id="signup">
            <h1>QA-проверка</h1>
            <form action="javascript:void(null)" method="post" id="myForm">
                <div class="field-wrap">
                    <input type="text" required name="characteristics" id="characteristics" autocomplete="off"
                           placeholder="Вес/Длина*"/>
                </div>
                <button type="submit" class="button button-block"/>
                Проверить</button>
            </form>
        </div>
        <ul class="tab-group">
            <li class="tab"><a id="getElephants">Отчёт за день</a></li>
            <li class="tab"><a id="nextElephants">Следующий слон</a></li>
        </ul>
        <div class="report">
            <h3>Отчет</h3>
            <div>Брак: <span class="reportDefect"></span></div>
            <div>В продажу: <span class="reportSale"></span></div>
        </div>
    </div>
</div>
<div class="listElephants">
    <p class="headerDefect">Бракованные слоны</p>
    <ul class="rolldown-list">
    </ul>
</div>

<?php }
}
