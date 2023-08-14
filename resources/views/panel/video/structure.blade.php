<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<div class="big-input">
    <input name="title_en" type="text" id="title_en" placeholder="title(en)">
</div>

<div class="big-input editor">
    <p class="ck-label">description(en)</p>
    <div id="toolbar-container_en"></div>
    <div id="description_en"></div>
</div>

<div class="big-input fa">
    <input name="title_fa" type="text" id="title_fa" placeholder="title(fa)">
</div>

<div class="big-input editor fa">
    <p class="ck-label">description(fa)</p>
    <div id="toolbar-container_fa"></div>
    <div id="description_fa">
    </div>
</div>

<div class="big-input">
    <input name="title_gr" type="text" id="title_gr" placeholder="title(gr)">
</div>

<div class="big-input editor">
    <p class="ck-label">description(gr)</p>
    <div id="toolbar-container_gr"></div>
    <div id="description_gr">
    </div>
</div>

<div class="big-input fa">
    <input name="title_ar" type="text" id="title_ar" placeholder="title(ar)">
</div>

<div class="big-input editor fa">
    <p class="ck-label">description(ar)</p>
    <div id="toolbar-container_ar"></div>
    <div id="description_ar">
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
    <label for="video_type"></label>
    <select onchange="changeVideoType($(this).val())" id="video_type">
        <option value="file">file</option>
        <option value="link">link</option>
    </select>
</div>

<div id="link-container" class="big-input hidden">
    <label for="video_link">video link</label>
    <input name="video_link" type="text" id="video_link">
</div>

<script src="{{ asset('panel/js/initCKs.js?v=2.1') }}"></script>

<script>

    var token = localStorage.getItem("token");
    if (token == null) document.location.href = '/login';

    function changeVideoType(val) {

        if (val === 'file') {
            $("#file-container").removeClass('hidden');
            $("#link-container").addClass('hidden');
        } else {
            $("#file-container").addClass('hidden');
            $("#link-container").removeClass('hidden');
        }

    }

    function putInForm(formData, lang) {

        let tmp = $("#description_" + lang).html();

        if (tmp === '<p style="text-align:justify;">description(' + lang + ')</p>')
            return;

        formData.append("description_" + lang, tmp);
    }

    $(document).ready(function() {
        
    });

</script>
