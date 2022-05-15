<div class="big-input">
    <input name="title_en" type="text" id="title_en" placeholder="title(en)">
</div>

<div class="big-input">
    <textarea name="digest_en" id="digest_en" placeholder="digest(en), at max 1000 char"></textarea>
</div>

<div class="big-input">
    <input name="tags_en" type="text" id="tags_en" placeholder="tags(en), separated by underline">
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

<div class="big-input fa">
    <textarea name="digest_fa" id="digest_fa" placeholder="digest(fa), at max 1000 char"></textarea>
</div>

<div class="big-input fa">
    <input name="tags_fa" type="text" id="tags_fa" placeholder="tags(fa), separated by underline">
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

<div class="big-input">
    <textarea name="digest_gr" id="digest_gr" placeholder="digest(gr), at max 1000 char"></textarea>
</div>

<div class="big-input">
    <input name="tags_gr" type="text" id="tags_gr" placeholder="tags(gr), separated by underline">
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

<div class="big-input fa">
    <textarea name="digest_ar" id="digest_ar" placeholder="digest(ar), at max 1000 char"></textarea>
</div>

<div class="big-input fa">
    <input name="tags_ar" type="text" id="tags_ar" placeholder="tags(ar), separated by underline">
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
    <select id="default_lang" name="default_lang">
        <option value="-1">default lang</option>
        <option value="en">en</option>
        <option value="fa">fa</option>
        <option value="ar">ar</option>
        <option value="gr">gr</option>
    </select>
</div>

<div class="big-input">
    <select id="visibility" name="visibility" class="hidden">
        <option value="-1">visibility</option>
        <option value="1">true</option>
        <option value="0">false</option>
    </select>
</div>

<div class="big-input">
    <img id="pic" class="hidden">
</div>

<div class="big-input">
    <input name="pic_file" type="file" id="file">
</div>

<script src="{{asset('panel/js/initCKs.js')}}"></script>
