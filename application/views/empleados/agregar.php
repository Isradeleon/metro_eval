<section class="container">
    <span style="text-align: center !important;" class="errors-section">
        <?php if (validation_errors()): ?>
            <p><strong><i class="fa fa-warning"></i> Error:</strong></p>
        <?php endif ?>
        <?php echo validation_errors() ?>
    </span>
    <ul class="horizontal-menu compact">
        <li><a class="current-step step" data-step="1" href="">Datos</a></li>
        <li><a class="step" data-step="2" href="">Depto./Gpo.</a></li>
        <li><a class="step" data-step="3" href="">Permisos</a></li>
    </ul>
    <section id="steps" class="login-panel">
        <?php echo form_open() ?>
            <!-- Datos -->
            <div class="step" data-number="1">
                <label>Nombre:</label><br>
                <div class="input-control text">
                    <input autofocus type="text" name="nombre" value="<?php echo set_value('nombre'); ?>">
                </div><br><br>
                <label>Ap. paterno:</label><br>
                <div class="input-control text">
                    <input type="text" name="ap_p" value="<?php echo set_value('ap_p'); ?>">
                </div><br><br>
                <label>Ap. materno:</label><br>
                <div class="input-control text">
                    <input type="text" name="ap_m" value="<?php echo set_value('ap_m'); ?>">
                </div><br><br>
                <section>
                    <button disabled style="display: inline;" class="button move"><i class="fa fa-arrow-left"></i></button>
                    <button data-action="forward" data-btn="1" style="display: inline; float:right;" class="button move"><i class="fa fa-arrow-right"></i></button>
                </section>
            </div>

            <!-- Depto./Gpo. -->
            <div style="display: none;" class="step" data-number="2">
                <label>Departamento:</label><br>
                <div class="input-control select">
                    <select name="departamento_id">
                        <?php foreach ($departamentos as $departamento): ?>
                            <option value="<?php echo $departamento['id'] ?>">
                                <?php echo $departamento['nombre'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div><br><br>
                <label>Grupo (ctrl+click para seleccionar varios grupos):</label><br>
                <div style="height: 100px;" class="input-control select">
                    <select name="grupo_id" multiple>
                        
                    </select>
                </div><br><br>
                <section>
                    <button data-action="backward" data-btn="2" style="display: inline;" class="button move"><i class="fa fa-arrow-left"></i></button>
                    <button data-action="forward" data-btn="2" style="display: inline; float:right;" class="button move"><i class="fa fa-arrow-right"></i></button>
                </section>
            </div>

            <!-- Permisos -->
            <div style="display: none;" class="step" data-number="3">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="text-align: center;" colspan="4">Permisos</th>
                        </tr>
                    </thead>
                    <tbody id="table-body"></tbody>
                </table>
                <section>
                    <button data-action="backward" data-btn="3" style="display: inline;" class="button move"><i class="fa fa-arrow-left"></i></button>
                    <button style="display: inline; float:right;" class="button"><i class="fa fa-check"></i> GUARDAR</button>
                </section>
            </div>
        </form>



    </section>
</section>

<script type="text/javascript">
$(function(){
    var grupos = JSON.parse(<?php echo json_encode($grupos_json) ?>)
    var permisos = JSON.parse(<?php echo json_encode($permisos_json) ?>)
    // console.log(grupos)
    // console.log(permisos)

    $('select[name="departamento_id"]').on('change',function(){
        $('select[name="grupo_id"]').empty()
        var selected = $(this).val()
        var valid_groups=grupos.filter(function(v){return v.d_id == selected})
        for (var i = valid_groups.length - 1; i >= 0; i--) {
            $('select[name="grupo_id"]').append(`
                <option value="${valid_groups[i]['id']}">
                ${valid_groups[i]['nombre']}
                </option>
            `)
        }
        $('select[name="grupo_id"]').trigger('change')
    })
    
    $('select[name="grupo_id"]').on('change',function(){
        $('#table-body').empty()

        var selected_options = $(this).val()
        for (var j = 0; j < selected_options.length; j++) {
            var valid_privileges=permisos.filter(function(v){return v.grupo_id == selected_options[j]})

            $('#table-body').append(`
                <tr>
                    <td style="text-align:center;" colspan="4"><strong>${
                        $('select[name="grupo_id"]').children('option[value="'+selected_options[j]+'"]').text()
                    }</strong></td>
                </tr>
            `)
            for (var i = 0; i < valid_privileges.length; i++) {
                $('#table-body').append(`
                    <tr>
                        <td>
                            <input type="hidden" name="privileges[]" value="${valid_privileges[i]['id']}">
                            ${valid_privileges[i]['nombre']}
                        </td>
                        <td>
                            <label class="input-control checkbox">
                                <input name="crear${valid_privileges[i]['id']}" type="checkbox">
                                <span class="check"></span>
                                <span class="caption">Crear</span>
                            </label>
                        </td>
                        <td>
                            <label class="input-control checkbox">
                                <input name="eliminar${valid_privileges[i]['id']}" type="checkbox">
                                <span class="check"></span>
                                <span class="caption">Eliminar</span>
                            </label>
                        </td>
                        <td>
                            <label class="input-control checkbox">
                                <input name="modificar${valid_privileges[i]['id']}" type="checkbox">
                                <span class="check"></span>
                                <span class="caption">Modificar</span>
                            </label>
                        </td>
                    </tr>
                `)
                valid_privileges[i]
            }
        }

        // for (var i = valid_privileges.length - 1; i >= 0; i--) {
        //     $('select[name="permiso_id"]').append(`
        //         <option value="${valid_privileges[i]['id']}">
        //         ${valid_privileges[i]['nombre']}
        //         </option>
        //     `)
        // }
    })

    $('select[name="departamento_id"]').trigger('change')

    $('a.step').on('click',function(e){
        e.preventDefault()
        e.stopPropagation()
        var step = $(this).data('step')
        $('.current-step').removeClass('current-step')
        $(this).addClass('current-step')
        $('div.step').hide()
        $('div.step[data-number="'+step+'"]').show()
    })

    $('.move').on('click',function(e){
        e.preventDefault()
        e.stopPropagation()
        var step = $(this).data('btn')
        var action = $(this).data('action')
        if (action=='forward') 
            $('a.step[data-step="'+(step+1)+'"]').trigger('click')
        else
            $('a.step[data-step="'+(step-1)+'"]').trigger('click')
    })
})
</script>