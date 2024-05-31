<?php
$client_total_count = $projects_info->client_total_count;
$count_yes = $projects_info->count_yes;
$count_no = $projects_info->count_no;

$progress = $client_total_count ? round(($count_yes / $client_total_count) * 100) : 0;
?>
<div class="card bg-white">
    <div class="card-header">
        <i data-feather="grid" class="icon-16"></i> &nbsp;<?php echo app_lang("projects_overview"); ?>
    </div>
    <div class="rounded-bottom pt-2">
        <div class="box">
            <div class="box-content">
                <a href="<?php echo get_uri('projects/all_projects/1'); ?>" class="text-default">
                    <div class="pt-3 pb10 text-center">
                        <div class="b-r">
                            <h4 class="strong mb-1 mt-0" style="color: #01B393;"><?php echo $count_yes; ?></h4>
                            <!-- <span><?php echo $open_status_text; ?></span> -->
                            <span>YES</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="box-content">
                <a href="<?php echo get_uri('projects/all_projects/2'); ?>" class="text-default">
                    <div class="pt-3 pb10 text-center">
                        <div class="b-r">
                            <h4 class="strong mb-1 mt-0 text-danger"><?php echo $count_no; ?></h4>
                            <!-- <span><?php echo $completed_status_text; ?></span> -->
                            <span>NO</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="box-content">
                <a href="<?php echo get_uri('projects/all_projects/3'); ?>" class="text-default">
                    <div class="pt-3 pb10 text-center">
                        <div>
                            <h4 class="strong mb-1 mt-0 text-warning"><?php echo $client_total_count; ?></h4>
                            <!-- <span><?php echo $hold_status_text; ?></span> -->
                            <span>TOTAL</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="container project-overview-widget">
            <div class="progress-outline">
                <div class="progress mt5 m-auto position-relative">
                    <div class="progress-bar bg-orange text-default" role="progressbar" style="width:<?php echo $progress; ?>%;" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100">
                        <span class="justify-content-center d-flex position-absolute w-100"><?php echo app_lang("progression"); ?> <?php echo $progress; ?>%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>