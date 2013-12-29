<h2>Edit Contest <?php echo $contest['contest_id'];?></h2>
<form class="form-horizontal" method="POST" action="/admin/contest/edit/<?php echo $contest['contest_id']; ?>">
    <fieldset>
        <legend>Basic Information</legend>
        <div class="control-group">
            <label class="control-label" for="title">Title</label>

            <div class="controls">
                <input type="text" class="input-xxlarge" name="title" id="title"
                       value="<?php echo $contest['title'];?>">

                <p></p>
                <label class="checkbox" for="private">
                    <input type="checkbox" name='private' id="private" <?php if (
                        array_key_exists('private', $contest) and $contest['private'] == true
                    ): ?>checked="checked"<?php endif;?>>
                    Private Contest
                </label>

                <p></p>
            </div>

            <label class="control-label" for="start_time">Start Time</label>

            <div class="controls">
                <input class="input-xlarge" id="start_time" name="start_time"
                       value="<?php echo($contest['start_time']);?>">

                <p></p>
            </div>

            <label class="control-label" for="end_time">Start Time</label>

            <div class="controls">
                <input class="input-xlarge" id="end_time" name="end_time"
                       value="<?php echo($contest['end_time']);?>">
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
        <div class="control-group">
            <label class="control-label" for="description">Description</label>

            <div class="controls">
                <textarea cols="50" rows="7" id="description" class="span8"
                          name="description"><?php //echo $contest['description'];?></textarea>
            </div>
        </div>
        <legend>Problem List</legend>
        <div class="control-group">
            <label class="control-label" for="problem-new">Add Probelm</label>

            <div class="controls">
                <input class="input-xxlarge" id="problem-new" name="problem-new"> <input class="btn btn-primary"
                                                                                         type="button" value="Add"
                                                                                         id="add-problem"/>
                <input type="hidden" id="problem-id"/>
                <input class="input-xlarge" id="problem-list" name="problemlist" type="hidden">

                <p></p>
                <script>
                    function resort_problems() {
                        $('#problem-list').val('');
                        $('#edit-problem-list li').each(function (k, v) {
//                    $(this).find('span')[0].innerHTML = String.fromCharCode(k + 65);
//                    alert($(v).attr('title'));
//                    alert($(v).attr('id'));
                            var old_value = $('#problem-list').val();
                            $('#problem-list').val(old_value + k + ':' + $(v).attr('id') + ';');
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

                        $("#edit-problem-list").append('<li class="ui-state-default" id="' + pid
                                + '"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>' + ptitle
                                + '<a style="float:right;">[x]</a></li>');
                        resort_problems();
                        bind_delete_event();
                    }

                    $(function () {
                        $("#add-problem").click(add_problem_event);
                        $("#problem-new").keypress(function (e) {
                            code = (e.keyCode ? e.keyCode : e.which);
                            if (code == 13) return false;
                        });

                        $("#problem-new").autocomplete({
                            minLength:2,
                            source:'/admin/problem/search',
                            focus:function (event, ui) {
                                $("#problem-new").val(ui.item.title);
                                return false;
                            },
                            select:function (event, ui) {
                                $("#problem-new").val(ui.item.title);
                                $("#problem-id").val(ui.item.id);
//       				$( "#project-description" ).html( ui.item.desc );
//       				$( "#project-icon" ).attr( "src", "images/" + ui.item.icon );
                                return false;
                            }
                        })
                                .data("autocomplete")._renderItem = function (ul, item) {
                            return $("<li></li>")
                                    .data("item.autocomplete", item)
                                    .append("<a>" + item.title + "<br>" + item.id + "</a>")
                                    .appendTo(ul);
                        };
                    });
                </script>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <ul id="edit-problem-list">
                    <?php foreach ($contest['plist'] as $p): ?>
                    <li class="ui-state-default" id="<?php echo $p['p_id'];?>"><span
                            class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $p['title'];?><a
                            style="float:right;">[x]</a></li>
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

    <div class="form-actions">
        <button class="btn btn-primary" type="submit">Save changes</button>
        <button class="btn" onclick="history.back()" type="reset">Cancel</button>
    </div>
</form>