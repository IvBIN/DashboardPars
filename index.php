<?php
require './Parser.php';

//1. Файл используется один.
//   Поле с ячейками с данными для диаграмм неизменно.
//2. Файл загружается через форму.
//3. Файл загружается каждый месяц.
//4. Данные с нарастанием указываются в файле. Не в PHP.


$fileName = $_FILES['file']['tmp_name'];
if (!empty($fileName)) {
    $parser = new Parser($fileName);
    $chart_bdr = $parser->getDataBdr();
//    var_dump($chart_bdr);

    $chart_ip = $parser->getDataIp();
//    var_dump($chart_ip);

    /**
     * Преобразование полученного массива к строке (требуемой для параметра data для диаграмм)
     */

//    var_dump($chart_bdr[0][0]);
//    var_dump($chart_bdr[1]);
//    $bdr_done =[];
//    foreach ($chart_bdr as $key=> $value) {
//
////        var_dump($key);
////        var_dump($value);
////        foreach ($value as $key => $item)
////            var_dump($key);
////        $bdr_done_final= array_push($bdr_done, `{$item}`);
////        var_dump($item);
////        var_dump($bdr_done_final);
//    }
}

//$bdr_data = $chart_bdr;
//$bdr_data = [300, 50, 60, 40, 100, 10, 20, 15];
//foreach ($bdr_data as $i){
//    echo gettype($i) . '<br>';
//}
//echo gettype($bdr_data);
//echo json_encode($bdr_data);

?>

<!--******* ДЕТАЛИЗАЦИЯ статистики (всплывающее окно) ******-->
<!--*1. Создать кнопку для открытия модального окна-->
<!--*2. Создать параметры модального окна-->
<!--*3. Создать содержимое, шаблон (контент) модального окна (таблица)-HTML (table tr td)-->
<!--*4. Получение и передача данных для шаблона (контент) модального окна (PHP)-->
<!--*5. Подключение кнопки к модальному окну (открыть/закрыть) (JS)-->

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard SpreadSheet PHP_Pars</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>

        <form enctype="multipart/form-data" method="post">
            <input type="file" name="file">
            <button>Отправить</button>
        </form>

        <style>
            body {
                display: flex;
                justify-content: start;
                align-items: center;
                gap: 10px;
                margin-top: 10px;
                margin-left: 20px;
            }
            form {
                margin-left: 20px;
            }

            div {
                width: 400px;
                height: 400px;
            }
            h4 {
                font-family: "Colibri", sans-serif;
                text-align: center;
                color: #040462;
                margin-bottom: 10px;
            }

        </style>

        <div>
            <h4>Договоры (БДР)</h4>
            <canvas id="myChart2"></canvas>
        </div>

        <div>
            <h4>Договоры (ИП)</h4>
            <canvas id="myChart3"></canvas>
        </div>

<!--        <a href="./view/table_bdr.php" id="okno_bdr">Раскрыть</a>-->
        <button id="oko_bdr1">Раскрыть</button>



<!--        <input type="hidden" id="bdr_data" value="--><?php //echo `{$bdr_data}`; ?><!--">-->

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>

            // const ctx = document.getElementById('myChart');
            // new Chart(ctx, {
            //     type: 'doughnut',
            //     data: {
            //         labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            //         datasets: [{
            //             label: 'Договоры',
            //             data: [12, 19, 3, 5, 2, 45],
            //             borderWidth: 1
            //         }]
            //     },
            //     options: {
            //         scales: {
            //             y: {
            //                 beginAtZero: true
            //             }
            //         }
            //     }
            // });

            /**
             * Построение диаграммы (БДР)
             */

            const ctx2 = document.getElementById('myChart2');

        /**
        * Преобразование элементов полученного массива ( из PHP)
         * из string в integer(требуемой для параметра data для диаграмм)
        */

            let bdr_data = "<?= json_encode($chart_bdr) ?>";

            bdr_data = bdr_data.replace(/[\[\] ]/g, '').split(',');
            console.log(typeof(bdr_data));
            console.log(bdr_data)

            // console.log(bdr_data);
            // console.log(bdr_data[0]);
            //
            // let bdr_dataS = bdr_data.split( );
            // console.log(bdr_dataS);
            // // console.log(typeof bdr_dataS);
            //
            // for (let i =0; i < bdr_dataS.length; i++){
            //     console.log(typeof bdr_dataS[i]);
            // }
            //
            // // let bdr_dataNum = [300, 50, 60, 40, 100, 10, 20, 15];
            // // console.log(bdr_dataNum);
            // // console.log(typeof bdr_dataNum);
            //
            // let bdr_dataN = [];
            // for (let i = 0; i < bdr_data.length; i++){
            //     // bdr_dataN[] = Number(bdr_data[i]);
            //     bdr_dataN.push(Number(bdr_data[i]));
            //     // bdr_dataN.push(bdr_data[i]);
            //
            //     // console.log(bdr_data[i]);
            // }
            // console.log(bdr_dataN);

            new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: ['ТП', 'КЗ', 'Прейскурант', 'ГПК', 'ТП_в', 'КЗ_в', 'Прейскурант_в', 'ГПК_в'],
                    datasets: [{
                        label: 'Количество',
                        data : bdr_data,

                        // data : [300,50,60,40,100,10,20,15],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(117,255,86)',
                            'rgb(255, 99, 132, 0.2)',
                            'rgb(54, 162, 235, 0.2)',
                            'rgb(255, 205, 86, 0.2)',
                            'rgb(117,255,86, 0.2)',

                        ],
                        borderWidth: 1,
                        hoverOffset: 20
                    }]
                },
                // options: {
                //     scales: {
                //         y: {
                //             beginAtZero: true
                //         }
                //     }
                // }
            });

            /**
             * Построение диаграммы (ИП)
             */
            const ctx3 = document.getElementById('myChart3');

            /**
             * Преобразование элементов полученного массива ( из PHP)
             * из string в integer(требуемой для параметра data для диаграмм)
             */

            let ip_data = "<?= json_encode($chart_ip) ?>";

            ip_data = ip_data.replace(/[\[\] ]/g, '').split(',');
            console.log(typeof(ip_data));
            console.log(ip_data)

            // console.log(bdr_data);
            // console.log(bdr_data[0]);
            //
            // let bdr_dataS = bdr_data.split( );
            // console.log(bdr_dataS);
            // // console.log(typeof bdr_dataS);
            //
            // for (let i =0; i < bdr_dataS.length; i++){
            //     console.log(typeof bdr_dataS[i]);
            // }
            //
            // // let bdr_dataNum = [300, 50, 60, 40, 100, 10, 20, 15];
            // // console.log(bdr_dataNum);
            // // console.log(typeof bdr_dataNum);
            //
            // let bdr_dataN = [];
            // for (let i = 0; i < bdr_data.length; i++){
            //     // bdr_dataN[] = Number(bdr_data[i]);
            //     bdr_dataN.push(Number(bdr_data[i]));
            //     // bdr_dataN.push(bdr_data[i]);
            //
            //     // console.log(bdr_data[i]);
            // }
            // console.log(bdr_dataN);

            new Chart(ctx3, {
                type: 'pie',
                data: {
                    label: 'Договоры (ИП)',
                    labels: ['ТП', 'КЗ', 'Прейскурант', 'ГПК', 'ТП_в', 'КЗ_в', 'Прейскурант_в', 'ГПК_в'],
                    datasets: [{
                        label: 'Количество',
                        data : ip_data,

                        // data : [300,50,60,40,100,10,20,15],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(117,255,86)',
                            'rgb(255, 99, 132, 0.2)',
                            'rgb(54, 162, 235, 0.2)',
                            'rgb(255, 205, 86, 0.2)',
                            'rgb(117,255,86, 0.2)',

                        ],
                        borderWidth: 1,
                        hoverOffset: 20
                    }]
                },
                // options: {
                //     scales: {
                //         y: {
                //             beginAtZero: true
                //         }
                //     }
                // }
            });
        </script>

        <script>
            function showWindow() {

                let windowDiv = document.createElement("div");
                windowDiv.innerHTML = "Демонстрация таблицы БДР";

                windowDiv.style.position = "fixed";
                windowDiv.style.width = "1000px";
                windowDiv.style.height = "300px";
                windowDiv.style.backgroundColor = "#A5F5CAF4";
                windowDiv.style.textAlign = "center";

                windowDiv.style.top = "50%";
                windowDiv.style.left = "10%";
                windowDiv.style.zIndex = "+500";
                // windowDiv.style.marginTop = "-50px";
                windowDiv.style.marginleft = "-50px";

                document.body.appendChild(windowDiv);
                windowDiv.setAttribute("id", "window_div");

                console.log(windowDiv);


                let closeDiv = document.createElement("button");
                closeDiv.innerHTML = "Закрыть";

                closeDiv.style.width = "60px";
                closeDiv.style.height = "20px";
                closeDiv.style.color = "#fff";
                closeDiv.style.backgroundColor = "#E3B89EF4";
                // closeDiv.style.border = "1px solid #fff";
                closeDiv.style.borderRadius = "3px";

                closeDiv.style.top = "50%";
                closeDiv.style.left = "10%";
                // closeDiv.style.zIndex = "+500";
                closeDiv.style.marginTop = "-5px";
                closeDiv.style.marginRight = "-50px";

                windowDiv.appendChild(closeDiv);
                closeDiv.setAttribute("id", "closeBtn");

                let closeButton = document.getElementById("closeBtn");
                closeButton.addEventListener("click", closeWindow);


        //***** Создание таблицы в окне ****

                // let table = document.getElementsByTagName("table")[0];
                let table = document.createElement("table");

                // let row = table.insertRow(0);
                // let cell1 = row.insertCell(1);
                // let cell2 = row.insertCell(2);
                // // let cell3 = row.insertCell(3);
                // // let cell4 = row.insertCell(4);
                // // let cell5 = row.insertCell(5);
                // // let cell6 = row.insertCell(6);
                // let t1 = document.createTextNode("№");
                // let t2 = document.createTextNode("Номер договора");
                // // let t3 = document.createTextNode("Предмет договора");
                // // let t4 = document.createTextNode("Способ закупки");
                // // let t5 = document.createTextNode("Количество");
                // // let t6 = document.createTextNode("Статус");
                // cell1.appendChild(t1);
                // cell2.appendChild(t2);
                // // cell3.appendChild(t3);
                // // cell4.appendChild(t4);
                // // cell5.appendChild(t5);
                // // cell6.appendChild(t6);
                //
                // // let row2 = table.insertRow(1);
                // // let cell2_1 = row.insertCell(1);
                // // let cell2_2 = row.insertCell(2);
                // // let cell2_3 = row.insertCell(3);
                // // let cell2_4 = row.insertCell(4);
                // // let cell2_5 = row.insertCell(5);
                // // let cell2_6 = row.insertCell(6);

                windowDiv.appendChild(table);
                table.setAttribute("id", "table");
                table.style.border = "1px solid black";
                table.style.marginLeft = "20px";
                table.style.marginTop = "20px";

                let tableRender = document.querySelector("#table");
                createTable(tableRender,6, 6);

                function createTable(parent, cols, rows) {
                    // let table = document.createElement()
                    for (let i = 0; i < rows; i++) {
                        let tr = document.createElement("tr");
                        for(let j = 0; j < cols; j++) {
                            let td = document.createElement("td");

                            tr.appendChild(td);
                            td.style.border = "1px solid black";
                            // td.style.width = "100px";
                            td.style.width = "max_content";
                            td.style.height = "30px";
                            td.style.padding = "5px";
                            td.innerText = "Договоры";
                        }
                        table.appendChild(tr);
                    }
                    parent.appendChild(table);
                }





                // let caption = table.createCaption();
                // let text = document.createTextNode("Договоры (БДР)");
                // caption.appendChild(text);




            }

            let winButton = document.getElementById("oko_bdr1");
            winButton.addEventListener("click", showWindow);


            function closeWindow() {
                let removeDiv = document.getElementById("window_div");
                document.body.removeChild(removeDiv);
            }

            // let closeButton = document.getElementById("closeBtn");
            // closeButton.addEventListener("click", closeWindow);


        </script>




    <!--        <div class="container">-->
    <!--            <div class="header">-->
    <!--                <div class="logo">LOGO</div>-->
    <!--                <div class="head_ib1">Enterprise_Version</div>-->
    <!--                <div class="head_ib_more">MORE</div>-->
    <!--            </div>-->
    <!--            <div class="field_dash">-->
    <!--                <div class="field_dash_left">-->
    <!--                    <div class="block_left_up">-->
    <!--                        <div class="block_info_bdr">-->
    <!--                            <h2 class="title_info">БДР</h2>-->
    <!--                            <span class="title_context">пояснение БДР</span>-->
    <!--                            <div class="info_graf"></div>-->
    <!--                        </div>-->
    <!--                        <div class="block_info_ip">-->
    <!--                            <h2 class="title_info">ИП</h2>-->
    <!--                            <span class="title_context">пояснение ИП</span>-->
    <!--                            <div class="info_graf"></div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="block_left_medium">-->
    <!--                        <h2 class="title_info">Договоры</h2>-->
    <!--                        <span class="title_context">пояснение Договоры</span>-->
    <!--                        <div class="info_graf">заключено: (Nзк) / исполнено: (Nис)</div>-->
    <!--                    </div>-->
    <!--                    <div class="block_left_down"></div>-->
    <!--                </div>-->
    <!--                <div class="field_dash_right">-->
    <!--                    <div class="block_right_up">-->
    <!--                        <h2 class="title_info">Отчеты</h2>-->
    <!--                        <span class="title_context">пояснение Отчеты</span>-->
    <!--                        <div class="info_graf_report1">-->
    <!--                            <span class="title_context title_report">ЕАЭС</span>-->
    <!--                            <div class="report_block">-->
    <!--                                <span class="report_part">I</span>-->
    <!--                                <span class="report_part">II</span>-->
    <!--                                <span class="report_part">III</span>-->
    <!--                                <span class="report_part">IV</span>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="block_right_medium">-->
    <!--                        <h2 class="title_info">Налоговый мониторинг</h2>-->
    <!--                        <span class="title_context">пояснение НМ</span>-->
    <!--                        <div class="info_graf_control">-->
    <!--                            <div class="block_control">-->
    <!--                                <span class="title_context title_control">ПХД :</span>-->
    <!--                                <div class="block_part_contr">-->
    <!--                                    <span class="control_part">1</span>-->
    <!--                                    <span class="control_part">2</span>-->
    <!--                                    <span class="control_part">3</span>-->
    <!--                                    <span class="control_part">4</span>-->
    <!--                                    <span class="control_part">5</span>-->
    <!--                                    <span class="control_part">6</span>-->
    <!--                                    <span class="control_part">7</span>-->
    <!--                                    <span class="control_part">8</span>-->
    <!--                                    <span class="control_part">9</span>-->
    <!--                                    <span class="control_part">10</span>-->
    <!--                                    <span class="control_part">11</span>-->
    <!--                                    <span class="control_part">12</span>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="block_control">-->
    <!--                                <span class="title_context title_control">ЭЦС :</span>-->
    <!--                                <div class="block_part_contr">-->
    <!--                                    <span class="control_part">1</span>-->
    <!--                                    <span class="control_part">2</span>-->
    <!--                                    <span class="control_part">3</span>-->
    <!--                                    <span class="control_part">4</span>-->
    <!--                                    <span class="control_part">5</span>-->
    <!--                                    <span class="control_part">6</span>-->
    <!--                                    <span class="control_part">7</span>-->
    <!--                                    <span class="control_part">8</span>-->
    <!--                                    <span class="control_part">9</span>-->
    <!--                                    <span class="control_part">10</span>-->
    <!--                                    <span class="control_part">11</span>-->
    <!--                                    <span class="control_part">12</span>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="block_control">-->
    <!--                                <span class="title_context title_control">Акты сверки :</span>-->
    <!--                                <div class="block_part_contr">-->
    <!--                                    <span class="control_part">1 квартал</span>-->
    <!--                                    <span class="control_part">2 квартал</span>-->
    <!--                                    <span class="control_part">3 квартал</span>-->
    <!--                                    <span class="control_part">4 квартал</span>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="block_right_down"></div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->

    </body>
</html>