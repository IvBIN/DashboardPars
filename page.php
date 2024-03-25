<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard SpreadSheet PHP_ParsS</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
    <body>
<!--        <div class="container">-->
<!--            <div class="header">-->
<!--                <div class="logo">LOGO</div>-->
<!--                <div class="head_ib1">Enterprise_Version</div>-->
<!--                <div class="head_ib_more">MORE</div>-->
<!--            </div>-->
<!--        </div>-->

        <style>
body {
    display: flex;
    justify-content: start;
                align-items: center;
                gap: 10px;
            }

            div {
    width: 250px;
                height: 250px;
            }
        </style>
        <div>
            <canvas id="myChart"></canvas>
        </div>
        <div>
            <canvas id="myChart2"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
    type: 'doughnut',
                data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
            label: 'Договоры',
                        data: [12, 19, 3, 5, 2, 45],
                        borderWidth: 1
                    }]
                },
                options: {
        scales: {
            y: {
                beginAtZero: true
                        }
        }
    }
            });
            const ctx2 = document.getElementById('myChart2');

            // new Chart(ctx2, {
            //     type: 'pie',
            //     data: {
            //         labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            //         datasets: [{
            //             label: 'Подсказка',
            //             data: [12, 19, 3, 5, 2, 3],
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

            new Chart(ctx2, {
    type: 'pie',
                data: {
        labels: ['ТП', 'КЭ', 'Прейскурант', 'ГПК', 'ТП_в', 'КЭ_в', 'Прейскурант_в', 'ГПК_в'],
                    datasets: [{
            label: 'Количество',
                        data: [300, 50, 60, 40, 100, 10, 20, 15,],
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
                        //
                        // borderWidth: 1
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