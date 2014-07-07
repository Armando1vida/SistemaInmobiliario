<!-- The file upload form used as target for the file upload widget -->
<?php if ($this->showForm) echo CHtml::beginForm($this->url, 'post', $this->htmlOptions); ?>

<div class=" fileupload-buttonbar">
    <div class="span7">
        <!-- The fileinput-button span is used to style the file input field as button -->
        <span class="btn btn-mini  btn-default fileinput-button">
            <i class="icon-plus icon-white"></i>
            <span><?php echo $this->t('1#Agregar imágenes|0#Choose file', $this->multiple); ?></span>
            <?php
            if ($this->hasModel()) :
                echo CHtml::activeFileField($this->model, $this->attribute, $htmlOptions) . "\n";
            else :
                echo CHtml::fileField($name, $this->value, $htmlOptions) . "\n";
            endif;
            ?>
        </span>
        <?php // if ($this->multiple) { ?>
        <!--		<button type="submit" class=" btn-mini btn btn-primary start">
                                <i class="icon-upload icon-white"></i>
                                <span>Start upload</span>
                        </button>
                        <button type="reset" class="btn-mini btn btn-warning cancel">
                                <i class="icon-ban-circle icon-white"></i>
                                <span>Cancel upload</span>
                        </button>-->
        <!--		<button type="button" class="  btn btn-danger delete">
                                <i class="icon-trash icon-white"></i>
                                <span>Delete</span>
                        </button>
                        <input type="checkbox" class="toggle">-->
        <?php // } ?>
    </div>
    <div class="span5">
        <!-- The global progress bar -->
        <div class="progress progress-success progress-striped active fade">
            <div class="bar" style="width:0%;"></div>
        </div>
    </div>
</div>
<!-- The loading indicator is shown during image processing -->
<div class="fileupload-loading">

</div>
<br>
<!-- The table listing the files available for upload/download -->
<!--<select class='hidden' name='archivos[]' multiple>-->
<?php // var_dump($this->model->algo)?>
<table class="table table-striped">
    <tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery">

<!--        {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
            {% if (file.error) { %}
            <td></td>
            <td class="name"><span>{%=file.name%}</span></td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
            {% } else { %}
            <td class="preview">{% if (file.thumbnail_url) { %}
                <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img width="50" height="50" src="{%=file.url%}"></a>
                {% } %}</td>
            <td class="name">
                <a href="{%=file.url%}" class='archivosNota' url="{%=file.url%}"  title="{%=file.name%}" filename="{%=file.filename%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
                <option type="hidden" value="{%=file.name%}"></option>
                <input type="hidden" class='archivosNota'>
            </td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td colspan="2"></td>
            {% } %}
            <td class="delete">
                <button class="btn-mini btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
                    <i class="icon-trash icon-white"></i>
                    <span>{%=locale.fileupload.destroy%}</span>
                </button>
                            <?php // if ($this->multiple) :        ?><input type="checkbox" name="delete" value="1">
                <?php // else: ?><input type="hidden" name="delete" value="1">
                <?php // endif; ?>
            </td>
        </tr>
        {% } %}-->

    </tbody>
</table>
<!--</select>-->
<?php if ($this->showForm) echo CHtml::endForm(); ?>
