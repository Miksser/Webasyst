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

