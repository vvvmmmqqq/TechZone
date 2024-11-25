
    <div id="myChart" style="width:100%; max-width: 900px; height: 900px;"></div>
    <?php
    include_once('/xampp/htdocs/Project1_Group-TechZone/model/m_base.php');
    
    $model = new BaseModel();
    echo $model->generateChartData();
    ?>
<?

