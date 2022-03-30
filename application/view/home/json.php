<?php

function tglJamDate($date) {
    return date('d-M-Y H:i', strtotime($date));
    // return strftime('%u %b %y', strtotime($date));
    // return time_elapsed_string($date);
}
?>
<div class="container mt-20 ">
    <div class="row">
        <h1>Hydant RND PJP Project</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">Body</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
        $i = 1;
        foreach($post as $row) { ?>
                <tr>
                    <th scope="row"><?=$i++;?></th>
                    <td><?=$row->id;?></td>
                    <td><?=$row->body;?></td>
                    <td><?=tglJamDate($row->created);?></td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>
<script src="<?=URL;?>js/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function reload_page() {
        window.location.reload(true);
    }
    setInterval(function() {
        reload_page();
    }, 1000);
});
</script>