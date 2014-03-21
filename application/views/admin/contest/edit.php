<?php /* @var Model_Contest $contest */ ?>
<form class="form-horizontal" method="POST" action="<?php e::url("/admin/contest/edit/{$contest->contest_id}"); ?>">
    <fieldset>
        <legend><?php echo(__('admin.contest.edit.basic')); ?></legend>
        <div class="form-group">
            <label class="control-label col-sm-2" for="title"><?php echo(__('admin.contest.edit.title')); ?></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title"
                       value="<?php echo $contest->title;?>">
                <p></p>
                <label class="checkbox" for="private">
                    <input type="checkbox" name='private' id="private" <?php if (
                        array_key_exists('private', $contest) and $contest->private == true
                    ): ?>checked="checked"<?php endif;?> value="1">
                    <?php echo(__('admin.contest.edit.private')); ?>
                </label>
                <p></p>
            </div>
            <div class="col-sm-5 col-sm-offset-2">
                <label class="control-label col-sm-4" for="start_time"><?php echo(__('admin.contest.edit.start')); ?></label>
                <div class="col-sm-8">
                    <input class="form-control" id="start_time" name="start_time" value="<?php echo($contest->start_time);?>">
                </div>
            </div>
            <div class="col-sm-5">
                <label class="control-label col-sm-4" for="end_time"><?php echo(__('admin.contest.edit.end')); ?></label>
                <div class="col-sm-8">
                    <input class="form-control" id="end_time" name="end_time" value="<?php echo($contest->end_time);?>">
                </div>
            </div>
            <script type="text/javascript">
                /* <![CDATA[ */
                $(function () {
                    var param = {showSecond:true, timeFormat:'hh:mm:ss', dateFormat:'yy-mm-dd'};
                    $('#start_time').datetimepicker(param);
                    $('#end_time').datetimepicker(param);
                });
                /* ]]> */
            </script>
            <?php echo HTML::script('js/jquery-ui-timepicker-addon.js'); ?>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="description"><?php echo(__('admin.contest.edit.description')); ?></label>
            <div class="col-sm-10">
                <textarea cols="50" rows="7" id="description" class="form-control" name="description"><?php echo $contest->description;?></textarea>
            </div>
        </div>
        <legend><?php echo(__('admin.contest.edit.problems')); ?></legend>
        <div class="form-group">
            <label class="control-label col-sm-2" for="problem-new"><?php echo(__('admin.contest.edit.add_problem')); ?></label>
            <div class="col-sm-6">
                <input class="form-control" id="problem-new" name="problem-new">
            </div>
            <div class="col-sm-2">
                <input class="btn btn-primary" type="button" value="<?php echo(__('admin.contest.edit.add')); ?>" id="add-problem"/>
                <input type="hidden" id="problem-id"/>
                <input class="form-control" id="problem-list" name="problemlist" type="hidden">
                <p></p>
            </div>
        </div>
                <script>
                    function resort_problems() {
                        $('#problem-list').val('');
                        $('#edit-problem-list li').each(function (k, v) {
//                    $(this).find('span')[0].innerHTML = String.fromCharCode(k + 65);
//                    alert($(v).attr('title'));
//                    alert($(v).attr('id'));
                            var old_value = $('#problem-list').val();
                            $('#problem-list').val(old_value + k + ':' + $(v).attr('data-value') + ';');
                        });
                    }
                    function bind_delete_event() {
                        $(".ui-state-default a").click(function (i, v) {
                            $(this).parent().remove();
                            resort_problems();
                            //alert('delete');
                        });
                    }
                    function add_problem_event() {
                        var ptitle = $("#problem-new").val();
                        var pid = $("#problem-id").val();

                        $("#edit-problem-list").append('<li class="ui-state-default" data-value="' + pid
                                + '"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>' + ptitle
                                + '<a>[x]</a></li>');
                        resort_problems();
                        bind_delete_event();
                        $('#problem-new').val('');
                        $("#problem-id").val('');
                    }

                    $(function () {
                        var cache = {};
                        $("#add-problem").click(add_problem_event);
                        $("#problem-new").keypress(function (e) {
                            var code = (e.keyCode ? e.keyCode : e.which);
                            if (code == 13) return false;
                        });

                        var datasource = function(request, response){
                            var term = request.term;
                            if ( term in cache )
                            {
                                response(cache[term]);
                                return;
                            }
                            $.getJSON('<?php e::url("/admin/problem/search"); ?>', request, function(data, status, xhr){
                                cache[ term ] = data;
                                response( data );
                            })
                        }
                        $("#problem-new").autocomplete({
                            minLength:2,
                            source: datasource,
                            focus:function (event, ui) {
                                $("#problem-new").val(ui.item.title);
                                return false;
                            },
                            select:function (event, ui) {
                                $("#problem-new").val(ui.item.title);
                                $("#problem-id").val(ui.item.id);
//              $( "#project-description" ).html( ui.item.desc );
//              $( "#project-icon" ).attr( "src", "images/" + ui.item.icon );
                                return false;
                            }
                        }).data("ui-autocomplete")._renderItem = function (ul, item) {
                            return $("<li></li>")
                                .data("item.autocomplete", item)
                                .append("<a>" + item.title + "<br>" + item.id + "</a>")
                                .appendTo(ul);
                        };
                    });
                </script>

        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <ul id="edit-problem-list">
                    <?php foreach ($contest->problem() as $pr): ?>
                    <li class="ui-state-default" data-value="<?php echo $pr->problem_id;?>"><span
                            class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $pr->title();?><a>x</a></li>
                    <?php endforeach;?>
                </ul>
                <script>

                    $(function () {
                        $("#edit-problem-list").sortable();
                        $("#edit-problem-list").disableSelection();
                        $("#edit-problem-list").bind('sortstop', function () {
                            resort_problems();
                        });
                    });
                    $(function () {
                        resort_problems();
                        bind_delete_event();
                    });
                </script>
            </div>
        </div>
    </fieldset>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <button class="btn btn-primary" type="submit"><?php echo(__('admin.contest.edit.save_changes')); ?></button>
            <button class="btn" onclick="history.back()" type="reset"><?php echo(__('admin.contest.edit.cancel')); ?></button>
        </div>
    </div>
</form>
