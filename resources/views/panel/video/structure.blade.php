<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<div class="big-input">
    <input name="title_en" type="text" id="title_en" placeholder="title(en)">
</div>

<div class="big-input editor">
    <div id="toolbar-container_en"></div>
    <div id="description_en">
        description(en)
    </div>
</div>

<div class="big-input fa">
    <input name="title_fa" type="text" id="title_fa" placeholder="title(fa)">
</div>

<div class="big-input editor fa">
    <div id="toolbar-container_fa"></div>
    <div id="description_fa">
        description(fa)
    </div>
</div>

<div class="big-input">
    <input name="title_gr" type="text" id="title_gr" placeholder="title(gr)">
</div>

<div class="big-input editor">
    <div id="toolbar-container_gr"></div>
    <div id="description_gr">
        description(gr)
    </div>
</div>

<div class="big-input fa">
    <input name="title_ar" type="text" id="title_ar" placeholder="title(ar)">
</div>

<div class="big-input editor fa">
    <div id="toolbar-container_ar"></div>
    <div id="description_ar">
        description(ar)
    </div>
</div>

<div class="big-input">
    <input name="priority" type="number" id="priority" placeholder="priority">
</div>

<div class="big-input">
    <select id="visibility" name="visibility" class="hidden">
        <option value="-1">visibility</option>
        <option value="1">true</option>
        <option value="0">false</option>
    </select>
</div>

<div class="big-input">
    <img id="preview" class="hidden">
</div>

<div class="big-input">
    <label for="preview_file">preview file</label>
    <input name="preview_file" type="file" id="preview_file">
</div>

<div class="big-input">
    <label for="video_file">video file</label>
    <input name="video_file" type="file" id="video_file">
</div>

<script src="{{asset('panel/js/initCKs.js?v=2.1')}}"></script>
