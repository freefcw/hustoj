<form class="form-inline well" role="form" action="<?php e::url('/problem/search');?>" method="GET">
    <div class="form-group">
        <label class="sr-only" for="text">Search Text</label>
        <input placeholder="Search" name="text" id="text" class="form-control"/>
    </div>
    <div class="form-group">
        <label class="sr-only" for="area">Type</label>
        <select name="area" class="form-control">
            <option value="title">Title</option>
            <option value="source">Source</option>
        </select>
    </div>
    <input type="submit" value="Go" class="btn">
</form>