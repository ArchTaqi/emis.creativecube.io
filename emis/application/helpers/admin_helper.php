<?php

define('UPDATE_URL', 'http://system-update.coderitems.com/Ultimate');
define('LATEST_VERSION', 'http://system-update.coderitems.com/Ultimate/latest_version.php');
define('TEMP_FOLDER', FCPATH . 'uploads' . '/');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function btn_edit($uri)
{
    return anchor($uri, '<i class="fa fa-pencil-square-o"></i>', array('class' => "btn btn-primary btn-xs", 'title' => 'Edit', 'data-toggle' => 'tooltip', 'data-placement' => 'top'));
}

function btn_update()
{
    return "<button data-toggle='tooltip' title=" . lang('update') . " data-placement='top' type='submit'  class='btn btn-xs btn-success'><i class='fa fa-check'></i></button>";

}

function btn_cancel($uri)
{
    return anchor($uri, '<i class="fa fa-times"></i>', array('class' => "btn btn-danger btn-xs", 'title' => lang('cancel'), 'data-toggle' => 'tooltip', 'data-placement' => 'top'));
}

function btn_edit_disable($uri)
{
    return anchor($uri, '<span class="fa fa-pencil-square-o"></span>', array('class' => "btn btn-primary btn-xs disabled", 'title' => 'Edit', 'data-toggle' => 'tooltip', 'data-placement' => 'top'));
}

function btn_edit_modal($uri)
{
    return anchor($uri, '<span class="fa fa-pencil-square-o"></span>', array('class' => "btn btn-primary btn-xs", 'title' => 'Edit', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'data-toggle' => 'modal', 'data-target' => '#myModal'));
}


function btn_banned_modal($uri)
{
    return anchor($uri, '<span class="fa fa-close"></span>', array('class' => "btn btn-danger btn-xs", 'title' => 'Edit', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'data-toggle' => 'modal', 'data-target' => '#myModal'));
}

function btn_delete($uri)
{
    return anchor($uri, '<i class="fa fa-trash-o"></i>', array(
        'class' => "btn btn-danger btn-xs", 'title' => 'Delete', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('" . lang('delete_alert') . "');"
    ));
}

function btn_delete_disable($uri)
{
    return anchor($uri, '<i class="fa fa-trash-o"></i>', array(
        'class' => "btn btn-danger btn-xs disabled", 'title' => 'Delete', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?');"
    ));
}

function btn_active($uri)
{
    return anchor($uri, '<i class="fa fa-check"></i>', array(
        'class' => "btn btn-success btn-xs", 'title' => 'Active', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('You are about to active new sesion . This cannot be undone. Are you sure?');"
    ));
}

function btn_print()
{
    return anchor('', '<span class="glyphicon glyphicon-print"></i></span>', array('class' => "btn btn-primary btn-xs", 'title' => 'Print', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => 'printDiv("printableArea")'));
}

function btn_atndc_print()
{
    return anchor('', '<span class="glyphicon glyphicon-print"></i></span>', array('class' => "btn btn-customs btn-xs", 'title' => 'Print', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => 'printDiv("printableArea")'));
}

function btn_pdf($uri)
{
    return anchor($uri, '<span <i class="fa fa-file-pdf-o"></i></span>', array('class' => "btn btn-primary btn-xs", 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'PDF'));
}

function btn_make_pdf($uri)
{
    return anchor($uri, '<span <i class="fa fa-file-pdf-o""></i></span>', array('class' => "btn btn-primary btn-xs", 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Generate&nbsp;PDF'));
}

function btn_excel($uri)
{
    return anchor($uri, '<span <i class="fa fa-file-excel-o"></i></span>', array('class' => "btn btn-primary btn-xs", 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Excel'));
}

function btn_view($uri)
{
    return anchor($uri, '<span class="fa fa-list-alt"></span>', array('class' => "btn btn-info btn-xs", 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'View'));
}

function btn_view_modal($uri)
{
    return anchor($uri, '<span class="fa fa-list-alt"></span>', array('class' => "btn btn-info btn-xs", 'title' => 'View', 'data-toggle' => 'modal', 'data-target' => '#myModal_lg'));
}

function btn_save($uri)
{
    return anchor($uri, '<span <i class="fa fa-plus-circle"></i></span>', array('class' => "btn btn-success btn-xs", 'title' => 'Save', 'data-toggle' => 'tooltip', 'data-placement' => 'top'));
}

function btn_add()
{
    return "<button type='submit' name='add' value='1' class='btn btn-info'>" . lang('add') . "</button>";
}

function btn_publish($uri)
{
    return anchor($uri, '<i class="fa fa-check"></i>', array(
        'class' => "btn btn-success btn-xs", 'title' => lang('click_to_published'), 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('You are about to unpublish this data. Are you sure?');"
    ));
}

function btn_unpublish($uri)
{
    return anchor($uri, '<i class="fa fa-times"></i>', array(
        'class' => "btn btn-danger btn-xs", 'title' => lang('click_to_unpublished'), 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('You are about to publish this data. Are you sure?');"
    ));
}

function btn_approve($uri)
{
    return anchor($uri, '<i class="fa fa-times"></i>', array(
        'class' => "btn btn-danger btn-xs", 'title' => 'Click to Reject', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('You are about to unpublish this data. Are you sure?');"
    ));
}

function btn_reject($uri)
{
    return anchor($uri, '<i class="fa fa-check"></i>', array(
        'class' => "btn btn-success btn-xs", 'title' => 'Click to Approve', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('You are about to publish this data. Are you sure?');"
    ));
}


function slug_it($str, $options = array())
{
    // Make sure string is in UTF-8 and strip invalid UTF-8 characters
    $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
    $defaults = array(
        'delimiter' => '_',
        'limit' => null,
        'lowercase' => true,
        'replacements' => array(
            '
            /\b(ѓ)\b/i' => 'gj',
            '/\b(ч)\b/i' => 'ch',
            '/\b(ш)\b/i' => 'sh',
            '/\b(љ)\b/i' => 'lj'
        ),
        'transliterate' => true
    );
    // Merge options
    $options = array_merge($defaults, $options);
    $char_map = array(
        // Latin
        'À' => 'A',
        'Á' => 'A',
        'Â' => 'A',
        'Ã' => 'A',
        'Ä' => 'A',
        'Å' => 'A',
        'Æ' => 'AE',
        'Ç' => 'C',
        'È' => 'E',
        'É' => 'E',
        'Ê' => 'E',
        'Ë' => 'E',
        'Ì' => 'I',
        'Í' => 'I',
        'Î' => 'I',
        'Ï' => 'I',
        'Ð' => 'D',
        'Ñ' => 'N',
        'Ò' => 'O',
        'Ó' => 'O',
        'Ô' => 'O',
        'Õ' => 'O',
        'Ö' => 'O',
        'Ő' => 'O',
        'Ø' => 'O',
        'Ù' => 'U',
        'Ú' => 'U',
        'Û' => 'U',
        'Ü' => 'U',
        'Ű' => 'U',
        'Ý' => 'Y',
        'Þ' => 'TH',
        'ß' => 'ss',
        'à' => 'a',
        'á' => 'a',
        'â' => 'a',
        'ã' => 'a',
        'ä' => 'a',
        'å' => 'a',
        'æ' => 'ae',
        'ç' => 'c',
        'è' => 'e',
        'é' => 'e',
        'ê' => 'e',
        'ë' => 'e',
        'ì' => 'i',
        'í' => 'i',
        'î' => 'i',
        'ï' => 'i',
        'ð' => 'd',
        'ñ' => 'n',
        'ò' => 'o',
        'ó' => 'o',
        'ô' => 'o',
        'õ' => 'o',
        'ö' => 'o',
        'ő' => 'o',
        'ø' => 'o',
        'ù' => 'u',
        'ú' => 'u',
        'û' => 'u',
        'ü' => 'u',
        'ű' => 'u',
        'ý' => 'y',
        'þ' => 'th',
        'ÿ' => 'y',
        // Latin symbols
        '©' => '(c)',
        // Greek
        'Α' => 'A',
        'Β' => 'B',
        'Γ' => 'G',
        'Δ' => 'D',
        'Ε' => 'E',
        'Ζ' => 'Z',
        'Η' => 'H',
        'Θ' => '8',
        'Ι' => 'I',
        'Κ' => 'K',
        'Λ' => 'L',
        'Μ' => 'M',
        'Ν' => 'N',
        'Ξ' => '3',
        'Ο' => 'O',
        'Π' => 'P',
        'Ρ' => 'R',
        'Σ' => 'S',
        'Τ' => 'T',
        'Υ' => 'Y',
        'Φ' => 'F',
        'Χ' => 'X',
        'Ψ' => 'PS',
        'Ω' => 'W',
        'Ά' => 'A',
        'Έ' => 'E',
        'Ί' => 'I',
        'Ό' => 'O',
        'Ύ' => 'Y',
        'Ή' => 'H',
        'Ώ' => 'W',
        'Ϊ' => 'I',
        'Ϋ' => 'Y',
        'α' => 'a',
        'β' => 'b',
        'γ' => 'g',
        'δ' => 'd',
        'ε' => 'e',
        'ζ' => 'z',
        'η' => 'h',
        'θ' => '8',
        'ι' => 'i',
        'κ' => 'k',
        'λ' => 'l',
        'μ' => 'm',
        'ν' => 'n',
        'ξ' => '3',
        'ο' => 'o',
        'π' => 'p',
        'ρ' => 'r',
        'σ' => 's',
        'τ' => 't',
        'υ' => 'y',
        'φ' => 'f',
        'χ' => 'x',
        'ψ' => 'ps',
        'ω' => 'w',
        'ά' => 'a',
        'έ' => 'e',
        'ί' => 'i',
        'ό' => 'o',
        'ύ' => 'y',
        'ή' => 'h',
        'ώ' => 'w',
        'ς' => 's',
        'ϊ' => 'i',
        'ΰ' => 'y',
        'ϋ' => 'y',
        'ΐ' => 'i',
        // Turkish
        'Ş' => 'S',
        'İ' => 'I',
        'Ç' => 'C',
        'Ü' => 'U',
        'Ö' => 'O',
        'Ğ' => 'G',
        'ş' => 's',
        'ı' => 'i',
        'ç' => 'c',
        'ü' => 'u',
        'ö' => 'o',
        'ğ' => 'g',
        // Russian
        'А' => 'A',
        'Б' => 'B',
        'В' => 'V',
        'Г' => 'G',
        'Д' => 'D',
        'Е' => 'E',
        'Ё' => 'Yo',
        'Ж' => 'Zh',
        'З' => 'Z',
        'И' => 'I',
        'Й' => 'J',
        'К' => 'K',
        'Л' => 'L',
        'М' => 'M',
        'Н' => 'N',
        'О' => 'O',
        'П' => 'P',
        'Р' => 'R',
        'С' => 'S',
        'Т' => 'T',
        'У' => 'U',
        'Ф' => 'F',
        'Х' => 'H',
        'Ц' => 'C',
        'Ч' => 'Ch',
        'Ш' => 'Sh',
        'Щ' => 'Sh',
        'Ъ' => '',
        'Ы' => 'Y',
        'Ь' => '',
        'Э' => 'E',
        'Ю' => 'Yu',
        'Я' => 'Ya',
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'yo',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'j',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'c',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'sh',
        'ъ' => '',
        'ы' => 'y',
        'ь' => '',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya',
        // Ukrainian
        'Є' => 'Ye',
        'І' => 'I',
        'Ї' => 'Yi',
        'Ґ' => 'G',
        'є' => 'ye',
        'і' => 'i',
        'ї' => 'yi',
        'ґ' => 'g',
        // Czech
        'Č' => 'C',
        'Ď' => 'D',
        'Ě' => 'E',
        'Ň' => 'N',
        'Ř' => 'R',
        'Š' => 'S',
        'Ť' => 'T',
        'Ů' => 'U',
        'Ž' => 'Z',
        'č' => 'c',
        'ď' => 'd',
        'ě' => 'e',
        'ň' => 'n',
        'ř' => 'r',
        'š' => 's',
        'ť' => 't',
        'ů' => 'u',
        'ž' => 'z',
        // Polish
        'Ą' => 'A',
        'Ć' => 'C',
        'Ę' => 'e',
        'Ł' => 'L',
        'Ń' => 'N',
        'Ó' => 'o',
        'Ś' => 'S',
        'Ź' => 'Z',
        'Ż' => 'Z',
        'ą' => 'a',
        'ć' => 'c',
        'ę' => 'e',
        'ł' => 'l',
        'ń' => 'n',
        'ó' => 'o',
        'ś' => 's',
        'ź' => 'z',
        'ż' => 'z',
        // Latvian
        'Ā' => 'A',
        'Č' => 'C',
        'Ē' => 'E',
        'Ģ' => 'G',
        'Ī' => 'i',
        'Ķ' => 'k',
        'Ļ' => 'L',
        'Ņ' => 'N',
        'Š' => 'S',
        'Ū' => 'u',
        'Ž' => 'Z',
        'ā' => 'a',
        'č' => 'c',
        'ē' => 'e',
        'ģ' => 'g',
        'ī' => 'i',
        'ķ' => 'k',
        'ļ' => 'l',
        'ņ' => 'n',
        'š' => 's',
        'ū' => 'u',
        'ž' => 'z',
    );

    // Make custom replacements
    $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
    // Transliterate characters to ASCII
    if ($options['transliterate']) {
        $str = str_replace(array_keys($char_map), $char_map, $str);
    }
    // Replace non-alphanumeric characters with our delimiter
    $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    // Remove duplicate delimiters
    $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
    // Truncate slug to max. characters
    $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
    // Remove delimiter from ends
    $str = trim($str, $options['delimiter']);
    return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}

function display_money($value, $currency = false, $decimal = 2)
{

    switch (config_item('money_format')) {
        case 1:
            $value = number_format($value, $decimal, '.', ',');
            break;
        case 2:
            $value = number_format($value, $decimal, ',', '.');
            break;
        case 3:
            $value = number_format($value, $decimal, '.', '');
            break;
        case 4:
            $value = number_format($value, $decimal, ',', '');
            break;
        case 5:
            $value = number_format($value, $decimal, ".", "'");
            break;
        case 6:
            $value = number_format($value, $decimal, ".", " ");
            break;
        case 7:
            $value = number_format($value, $decimal, ",", " ");
            break;
        case 8:
            $value = number_format($value, $decimal, "'", " ");
            break;
        default:
            $value = number_format($value, $decimal, '.', ',');
            break;
    }
    switch (config_item('currency_position')) {
        case 1:
            $return = $currency . ' ' . $value;
            break;
        case 2:
            $return = $value . ' ' . $currency;
            break;
        case false:
            $return = $value;
            break;
        default:
            $return = $currency . ' ' . $value;
            break;
    }

    return $return;
}

function display_time($value, $no_str = null)
{
    if (!empty($no_str)) {
        $time = $value;
    } else {
        $time = strtotime($value);
    }
    return date(config_item('time_format'), $time);
}

function display_date($value)
{
    return strftime(config_item('date_format'), strtotime($value));
}

function display_datetime($value, $no_str = null)
{
    if (!empty($no_str)) {
        $datetime = $value;
    } else {
        $datetime = strtotime($value);
    }
    return strftime(config_item('date_format'), $datetime) . ' ' . date(config_item('time_format'), $datetime);
}

function custom_form_Fields($id, $edit_id = null, $col_sm = null)
{
    $CI = &get_instance();
    $all_field = $CI->db->where('form_id', $id)->get('tbl_custom_field')->result();

    $table = $CI->db->where('form_id', $id)->get('tbl_form')->row()->tbl_name;
    $filed_id = str_replace('tbl_', '', $table);
    $html = null;
    if (!empty($all_field)) {
        foreach ($all_field as $v_fileds) {
            if (!empty($v_fileds->visible_for_admin)) {
                if ($CI->session->userdata('user_type') == 1) {
                    $name = strtolower(preg_replace('/\s+/', '_', $v_fileds->field_label));
                    if (!empty($edit_id)) {
                        $showValue = $CI->db->where($filed_id . '_id', $edit_id)->get($table)->row($name);
                    }
                    if (!empty($showValue)) {
                        $value = $showValue;
                    } else {
                        $val = json_decode($v_fileds->default_value);
                        $value = $val[0];
                    }
                    if (!empty($col_sm)) {
                        $col = 'col-lg-2';
                    } else {
                        $col = 'col-lg-3';
                    }


                    if ($v_fileds->required == 'on') {
                        $required = 'required';
                        $l_required = '<span class="required">*</span>';
                    } else {
                        $required = null;
                        $l_required = null;
                    }
                    if (!empty($v_fileds->help_text)) {
                        $help_text = '<i title="' . $v_fileds->help_text . '" class="fa fa-question-circle" data-toggle="tooltip" data-placement="top"></i>';
                    } else {
                        $help_text = null;
                    }

                    if ($v_fileds->field_type == 'text' && $v_fileds->status == 'active') {

                        $html .= '<div class="form-group">
                <label class="' . $col . ' control-label">' . $v_fileds->field_label . ' ' . $l_required . '  ' . $help_text . '</label>
                <div class="col-lg-5">
                <input type="text" name="' . $name . '" class="form-control" ' . $required . ' value="' . $value . '">
                </div>
                </div>';
                    }
                    if ($v_fileds->field_type == 'email' && $v_fileds->status == 'active') {

                        $html .= '<div class="form-group">
                <label class="' . $col . ' control-label">' . $v_fileds->field_label . ' ' . $l_required . '  ' . $help_text . '</label>
                <div class="col-lg-5">
                <input type="email" name="' . $name . '" class="form-control" ' . $required . ' value="' . $value . '">
                </div>
                </div>';
                    }
                    if ($v_fileds->field_type == 'textarea' && $v_fileds->status == 'active') {

                        $html .= '<div class="form-group">
                <label class="' . $col . ' control-label">' . $v_fileds->field_label . ' ' . $l_required . '  ' . $help_text . '</label>
                <div class="col-lg-5">
                <textarea name="' . $name . '" class="form-control" ' . $required . '>' . $value . '</textarea>
                </div>
                </div>';
                    }
                    if ($v_fileds->field_type == 'dropdown' && $v_fileds->status == 'active') {

                        $html .= '<div class="form-group">
                <label class="' . $col . ' control-label">' . $v_fileds->field_label . ' ' . $l_required . '  ' . $help_text . '</label>
                <div class="col-lg-5">
                <select name="' . $name . '" class="form-control select_box" style="width:100%" ' . $required . '>
                ' . dropdownField($v_fileds->default_value, $value) . '

                </select>
                </div>
                </div>';
                    }
                    if ($v_fileds->field_type == 'date' && $v_fileds->status == 'active') {

                        $html .= '<div class="form-group">
                <label class="' . $col . ' control-label">' . $v_fileds->field_label . ' ' . $l_required . '  ' . $help_text . '</label>
                <div class="col-lg-5">
                <div class="input-group">
                <input type="text" name="' . $name . '" class="form-control datepicker" value="' . (!empty($value) ? $value : date('Y-m-d')) . '">
                <div class="input-group-addon">
                <a href="#"><i class="fa fa-calendar"></i></a>
                </div>
                </div>
                </div>
                </div>';
                    }
                    if ($v_fileds->field_type == 'checkbox' && $v_fileds->status == 'active') {
                        $val = json_decode($v_fileds->default_value);
                        $html .= '<div class="form-group">
                <label class="' . $col . ' control-label">' . $v_fileds->field_label . ' ' . $l_required . '  ' . $help_text . '</label>
                <div class="col-lg-5">
                <div class="checkbox c-checkbox">
                   <label class="needsclick">
                   <input type="checkbox" name="' . $name . '" ' . (!empty($value) && $value == 'on' ? 'checked' : $value = $val[0]) . ' ' . $required . '>
                   <span class="fa fa-check"></span>
                   </label>
                </div>
                </div>
                </div>';
                    }
                    if ($v_fileds->field_type == 'numeric' && $v_fileds->status == 'active') {

                        $html .= '<div class="form-group">
                <label class="' . $col . ' control-label">' . $v_fileds->field_label . ' ' . $l_required . '  ' . $help_text . '</label>
                <div class="col-lg-5">
                <input type="number" name="' . $name . '" class="form-control" ' . $required . ' value="' . $value . '">
                </div>
                </div>';
                    }
                }
            } else {
                $name = strtolower(preg_replace('/\s+/', '_', $v_fileds->field_label));

                if (!empty($edit_id)) {
                    $showValue = $CI->db->where($filed_id . '_id', $edit_id)->get($table)->row($name);
                }

                if (!empty($showValue)) {
                    $value = $showValue;
                } else {
                    $val = json_decode($v_fileds->default_value);
                    $value = $val[0];
                }
                if (!empty($col_sm)) {
                    $col = 'col-lg-2';
                } else {
                    $col = 'col-lg-3';
                }


                if ($v_fileds->required == 'on') {
                    $required = 'required';
                    $l_required = '<span class="required">*</span>';
                } else {
                    $required = null;
                    $l_required = null;
                }
                if (!empty($v_fileds->help_text)) {
                    $help_text = '<i title="' . $v_fileds->help_text . '" class="fa fa-question-circle" data-toggle="tooltip" data-placement="top"></i>';
                } else {
                    $help_text = null;
                }

                if ($v_fileds->field_type == 'text' && $v_fileds->status == 'active') {

                    $html .= '<div class="form-group">
                <label class="' . $col . ' control-label">' . $v_fileds->field_label . ' ' . $l_required . '  ' . $help_text . '</label>
                <div class="col-lg-5">
                <input type="text" name="' . $name . '" class="form-control" ' . $required . ' value="' . $value . '">
                </div>
                </div>';
                }
                if ($v_fileds->field_type == 'textarea' && $v_fileds->status == 'active') {

                    $html .= '<div class="form-group">
                <label class="' . $col . ' control-label">' . $v_fileds->field_label . ' ' . $l_required . '  ' . $help_text . '</label>
                <div class="col-lg-5">
                <textarea name="' . $name . '" class="form-control" ' . $required . '>' . $value . '</textarea>
                </div>
                </div>';
                }
                if ($v_fileds->field_type == 'dropdown' && $v_fileds->status == 'active') {

                    $html .= '<div class="form-group">
                <label class="' . $col . ' control-label">' . $v_fileds->field_label . ' ' . $l_required . '  ' . $help_text . '</label>
                <div class="col-lg-5">
                <select name="' . $name . '" class="form-control select_box" style="width:100%" ' . $required . '>
                ' . dropdownField($v_fileds->default_value, $value) . '

                </select>
                </div>
                </div>';
                }
                if ($v_fileds->field_type == 'date' && $v_fileds->status == 'active') {

                    $html .= '<div class="form-group">
                <label class="' . $col . ' control-label">' . $v_fileds->field_label . ' ' . $l_required . '  ' . $help_text . '</label>
                <div class="col-lg-5">
                <div class="input-group">
                <input type="text" name="' . $name . '" class="form-control datepicker" value="' . (!empty($value) ? $value : date('Y-m-d')) . '">
                <div class="input-group-addon">
                <a href="#"><i class="fa fa-calendar"></i></a>
                </div>
                </div>
                </div>
                </div>';
                }
                if ($v_fileds->field_type == 'checkbox' && $v_fileds->status == 'active') {
                    $val = json_decode($v_fileds->default_value);
                    $html .= '<div class="form-group">
                <label class="' . $col . ' control-label">' . $v_fileds->field_label . ' ' . $l_required . '  ' . $help_text . '</label>
                <div class="col-lg-5">
                <div class="checkbox c-checkbox">
                   <label class="needsclick">
                   <input type="checkbox" name="' . $name . '" ' . (!empty($value) && $value == 'on' ? 'checked' : $value = $val[0]) . ' ' . $required . '>
                   <span class="fa fa-check"></span>
                   </label>
                </div>
                </div>
                </div>';
                }
                if ($v_fileds->field_type == 'numeric' && $v_fileds->status == 'active') {

                    $html .= '<div class="form-group">
                <label class="' . $col . ' control-label">' . $v_fileds->field_label . ' ' . $l_required . '  ' . $help_text . '</label>
                <div class="col-lg-5">
                <input type="number" name="' . $name . '" class="form-control" ' . $required . ' value="' . $value . '">
                </div>
                </div>';
                }
            }
        }
    }
    return $html;

}


function dropdownField($value, $editValue = null)
{
    $html = null;
    foreach (json_decode($value) as $optionValue) {
        $html .= '<option value="' . $optionValue . '" ' . (!empty($editValue) && $editValue == $optionValue ? "selected" : null) . '>' . $optionValue . '</option>';
    }
    return $html;
}

function save_custom_field($id, $edit_id = null)
{
    $CI = &get_instance();
    $CI->load->model('admin_model');

    $all_field = $CI->db->where('form_id', $id)->get('tbl_custom_field')->result();
    $table = $CI->db->where('form_id', $id)->get('tbl_form')->row()->tbl_name;

    $filed_id = str_replace('tbl_', '', $table);
    $table_id = $filed_id . '_id';
    $custom = array();
    if (!empty($all_field)) {
        foreach ($all_field as $v_fileds) {
            if (!empty($v_fileds->visible_for_admin)) {
                if ($CI->session->userdata('user_type') == 1) {
                    $name = strtolower(preg_replace('/\s+/', '_', $v_fileds->field_label));
                    $custom[$name] = $CI->input->post($name, true);
                }
            } else {
                $name = strtolower(preg_replace('/\s+/', '_', $v_fileds->field_label));
                $custom[$name] = $CI->input->post($name, true);
            }
        }
        $CI->admin_model->_table_name = $table; //table name
        $CI->admin_model->_primary_key = $table_id;
        $CI->admin_model->save($custom, $edit_id);
    }

}

function custom_form_label($id, $show_id)
{

    $CI = &get_instance();
    $CI->load->model('admin_model');

    $all_field = $CI->db->where('form_id', $id)->get('tbl_custom_field')->result();

    $table = $CI->db->where('form_id', $id)->get('tbl_form')->row()->tbl_name;
    $filed_id = str_replace('tbl_', '', $table);
    $table_id = $filed_id . '_id';

    $showValue = array();
    if (!empty($all_field)) {
        foreach ($all_field as $v_fileds) {
            if (!empty($v_fileds->visible_for_admin)) {
                if ($CI->session->userdata('user_type') == 1) {
                    if ($v_fileds->show_on_details == 'on') {
                        $name = strtolower(preg_replace('/\s+/', '_', $v_fileds->field_label));
                        $showValue[$v_fileds->field_label] = $CI->db->where($table_id, $show_id)->get($table)->row($name);
                    }
                }
            } else {
                if ($v_fileds->show_on_details == 'on') {
                    $name = strtolower(preg_replace('/\s+/', '_', $v_fileds->field_label));
                    $showValue[$v_fileds->field_label] = $CI->db->where($table_id, $show_id)->get($table)->row($name);
                }
            }
        }
    }
    return $showValue;
}

function custom_form_table($id, $show_id)
{

    $CI = &get_instance();
    $CI->load->model('admin_model');

    $all_field = $CI->db->where('form_id', $id)->get('tbl_custom_field')->result();

    $table = $CI->db->where('form_id', $id)->get('tbl_form')->row()->tbl_name;
    $filed_id = str_replace('tbl_', '', $table);
    $table_id = $filed_id . '_id';

    $showValue = array();
    if (!empty($all_field)) {
        foreach ($all_field as $v_fileds) {
            if (!empty($v_fileds->visible_for_admin)) {
                if ($CI->session->userdata('user_type') == 1) {
                    if ($v_fileds->show_on_table == 'on') {
                        $name = strtolower(preg_replace('/\s+/', '_', $v_fileds->field_label));
                        $showValue[$v_fileds->field_label] = $CI->db->where($table_id, $show_id)->get($table)->row($name);
                    }
                }
            } else {
                if ($v_fileds->show_on_table == 'on') {
                    $name = strtolower(preg_replace('/\s+/', '_', $v_fileds->field_label));
                    $showValue[$v_fileds->field_label] = $CI->db->where($table_id, $show_id)->get($table)->row($name);
                }
            }
        }
    }
    return $showValue;
}

function url_encode($data)
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function url_decode($data)
{
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}

function encrypt($data)
{
    return get_instance()->encryption->encrypt($data);
}

function decrypt($data)
{
    return get_instance()->encryption->decrypt($data);
}

function can_action($menu_id, $action)
{
    $CI = &get_instance();
    $designations_id = $CI->session->userdata('designations_id');
    $where = array('designations_id' => $designations_id, $action => $menu_id);
    $user_type = $CI->session->userdata('user_type');
    if ($user_type == 1) {
        return true;
    } else {
        $can_do = $CI->db->where($where)->get('tbl_user_role')->row();
        if (!empty($can_do)) {
            return true;
        }
    }
}

function can_do($menu_id)
{
    $CI = &get_instance();
    $designations_id = $CI->session->userdata('designations_id');
    $user_type = $CI->session->userdata('user_type');
    if ($user_type == 1) {
        return true;
    } else {
        $can_do = $CI->db->where(array('designations_id' => $designations_id, 'menu_id' => $menu_id))->get('tbl_user_role')->result();
        if (!empty($can_do)) {
            return true;
        }
    }
}

function value_exists_in_array_by_key($array, $key, $val)
{
    foreach ($array as $item) {
        if (isset($item[$key]) && $item[$key] == $val) {
            return true;
        }
    }
    return false;
}

function clear_textarea_breaks($text)
{
    $_text = '';
    $_text = $text;
    $breaks = array(
        "<br />",
        "<br>",
        "<br/>",
        "'",
        "-",
        "^",
        "/",
        "%",
    );
    $_text = str_ireplace($breaks, "", $_text);
    $_text = trim($_text);
    return $_text;
}

function set_mysql_timezone($timezone)
{
    $offset = timezone_offset_get(new DateTimeZone($timezone), new DateTime());
    $sign = ($offset > 0) ? '+' : '-';
    $offset = gmdate('H:i', abs($offset));
    $zone = $sign . $offset;
    $CI = &get_instance();
    $CI->db->query("SET time_zone='$zone'");
    return true;
}

function access_denied($permission = '', $module = null)
{
    $CI = &get_instance();
    set_message('danger', lang('access_denied'));
    $activity = array(
        'user' => $CI->session->userdata('user_id'),
        'module' => $module,
        'module_field_id' => $CI->session->userdata('user_id'),
        'activity' => 'access_denied',
        'value1' => 'Tried to access page where don\'t have permission [' . $permission . ']',
    );


    $CI->load->model('account_model');
    $CI->admin_model->_table_name = 'tbl_activities';
    $CI->admin_model->_primary_key = 'activities_id';
    $CI->admin_model->save($activity);

    if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
        redirect($_SERVER['HTTP_REFERER']);
    } else {
        redirect('404');
    }
}

function check_installation()
{
    if (is_dir(FCPATH . 'install')) {
        echo '<h3>Delete the install folder</h3>';
        die;
    }
}

/**
 * Function that will replace the dropbox link size for the images
 * This function is used to preview dropbox image attachments
 * @param  string $url
 * @param  string $bounding_box
 * @return string
 */
function optimize_dropbox_thumbnail($url, $bounding_box = '800')
{
    $url = str_replace('bounding_box=75', 'bounding_box=' . $bounding_box, $url);

    return $url;
}

function protected_file_url_by_path($path)
{
    return str_replace(FCPATH, '', $path);
}

function _mime_content_type($filename)
{
    if (function_exists('mime_content_type'))
        return mime_content_type($filename);
    else if (function_exists('finfo_open')) {
        $finfo = finfo_open(FILEINFO_MIME);
        $mimetype = finfo_file($finfo, $filename);
        return $mimetype;
    } else
        return get_mime_by_extension($filename);
}

/**
 * Add user notifications
 * @param array $values array of values [description,from_user_id,to_user_id,is_read]
 */
function add_notification($values)
{
    $CI =& get_instance();
    foreach ($values as $key => $value) {
        $data[$key] = $value;
    }
    if (!empty($data['from_user_id'])) {
        $user_id = $CI->session->userdata('user_id');
        $data['from_user_id'] = $user_id;
        $data['name'] = $CI->db->where('user_id', $user_id)->get('tbl_account_details')->row()->fullname;
    }
    // Prevent sending notification to non active users.
    if (isset($data['to_user_id']) && $data['to_user_id'] != 0) {
        $CI->db->where('user_id', $data['to_user_id']);
        $user = $CI->db->get('tbl_users')->row();
        if (!$user) {
            return false;
        }
        if ($user) {
            if ($user->activated == 0) {
                return false;
            }
        }
    }
    $data['date'] = date('Y-m-d H:i:s');
    $CI->db->insert('tbl_notifications', $data);
    return true;
}

function profile($id = null)
{
    $CI =& get_instance();
    if (empty($id)) {
        $id = $CI->session->userdata('user_id');
    }
    if (!empty($id)) {

        return $CI->db
            ->where("tbl_users.user_id", $id)
            ->join("tbl_account_details", "tbl_account_details.user_id = tbl_users.user_id")
            ->get("tbl_users")->row();
    } else {
        return false;
    }
}

function my_id()
{
    $CI =& get_instance();
    return $CI->session->userdata('user_id');
}

function staffImage($user_id = null)
{
    $CI =& get_instance();
    if (empty($user_id)) {
        $user_id = $CI->session->userdata('user_id');
    }
    $userInfo = $CI->db->where('user_id', $user_id)->get('tbl_account_details')->row();
    if (!empty($userInfo)) {
        return $userInfo->avatar;
    } else {
        return 'assets/img/user/default_avatar.jpg';
    }
}

function fullname($user_id = null)
{
    $CI =& get_instance();
    if (empty($user_id)) {
        $user_id = $CI->session->userdata('user_id');
    }
    $userInfo = $CI->db->where('user_id', $user_id)->get('tbl_account_details')->row();
    if (!empty($userInfo)) {
        return $userInfo->fullname;
    } else {
        return 'Undefined user';
    }
}

function client_name($client_id = null)
{
    $CI =& get_instance();
    if (empty($client_id)) {
        $client_id = $CI->session->userdata('client_id');
    }
    if (is_numeric($client_id)) {
        $clientInfo = $CI->db->where('client_id', $client_id)->get('tbl_client')->row();
    }
    if (!empty($clientInfo)) {
        return $clientInfo->name;
    } else {
        return lang('undefined_client');
    }
}

function client_id()
{
    $CI =& get_instance();
    $client_id = $CI->session->userdata('client_id');
    return $client_id;

}

function designation($id = null)
{
    $CI =& get_instance();
    if (empty($user_id)) {
        $id = $CI->session->userdata('user_id');
    }
    $userInfo = $CI->db->where('user_id', $id)->get('tbl_account_details')->row();
    if (!empty($userInfo->designations_id)) {
        $designation = $CI->db->where('designations_id', $userInfo->designations_id)->get('tbl_designations')->row()->designations;
    } else {
        $designation = '-';
    }
    return $designation;
}

/**
 *
 * @param  $array - data
 * @param  $key - value you want to pluck from array
 *
 * @return plucked array only with key data
 */
if (!function_exists('array_pluck')) {
    function array_pluck($array, $key)
    {
        return array_map(function ($v) use ($key) {
            return is_object($v) ? $v->$key : $v[$key];
        }, $array);
    }
}

/**
 * Short Time ago function
 * @param  datetime $time_ago
 * @return mixed
 */
function time_ago($time_ago)
{
    if (is_numeric($time_ago) && (int)$time_ago == $time_ago) {
        $time_ago = $time_ago;
    } else {
        $time_ago = strtotime($time_ago);
    }
    $cur_time = time();
    $time_elapsed = $cur_time - $time_ago;
    $seconds = $time_elapsed;
    $minutes = round($time_elapsed / 60);
    $hours = round($time_elapsed / 3600);
    $days = round($time_elapsed / 86400);
    $weeks = round($time_elapsed / 604800);
    $months = round($time_elapsed / 2600640);
    $years = round($time_elapsed / 31207680);
    // Seconds
    if ($seconds <= 60) {
        return lang('time_ago_just_now');
    } //Minutes
    elseif ($minutes <= 60) {
        if ($minutes == 1) {
            return lang('time_ago_minute');
        } else {
            return lang('time_ago_minutes', $minutes);
        }
    } //Hours
    elseif ($hours <= 24) {
        if ($hours == 1) {
            return lang('time_ago_hour');
        } else {
            return lang('time_ago_hours', $hours);
        }
    } //Days
    elseif ($days <= 7) {
        if ($days == 1) {
            return lang('time_ago_yesterday');
        } else {
            return lang('time_ago_days', $days);
        }
    } //Weeks
    elseif ($weeks <= 4.3) {
        if ($weeks == 1) {
            return lang('time_ago_week');
        } else {
            return lang('time_ago_weeks', $weeks);
        }
    } //Months
    elseif ($months <= 12) {
        if ($months == 1) {
            return lang('time_ago_month');
        } else {
            return lang('time_ago_months', $months);
        }
    } //Years
    else {
        if ($years == 1) {
            return lang('time_ago_year');
        } else {
            return lang('time_ago_years', $years);
        }
    }
}

function daysleft($time)
{
    $result = null;
    $to_date = strtotime($time); //Future date.
    $cur_date = strtotime(date('Y-m-d'));
    $timeleft = $to_date - $cur_date;
    $daysleft = round((($timeleft / 24) / 60) / 60);
    if ($daysleft == 1) {
        $result = $daysleft . ' ' . lang('day') . ' ' . lang('left');
    } else if ($daysleft > 1) {
        $result = $daysleft . ' ' . lang('days') . ' ' . lang('left');
    } else if ($daysleft == -1) {
        $result = $daysleft . ' ' . lang('day') . ' ' . lang('gone');
    } else if ($daysleft > -1) {
        $result = $daysleft . ' ' . lang('days') . ' ' . lang('gone');
    }
    return $result;

}

/**
 * check post file is valid or not
 *
 * @param string $file_name
 * @return json data of success or error message
 */
if (!function_exists('validate_post_file')) {

    function validate_post_file($file_name = "")
    {
        if (is_valid_file_to_upload($file_name)) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('invalid_file_type') . " ($file_name)"));
        }
    }

}

/**
 * this method process 3 types of files
 * 1. direct upload
 * 2. move a uploaded file which has been uploaded in temp folder
 * 3. copy a text based image
 *
 * @param string $file_name
 * @param string $target_path
 * @param string $source_path
 * @param string $static_file_name
 * @return filename
 */
if (!function_exists('move_temp_file')) {

    function move_temp_file($file_name, $target_path, $related_to = "", $source_path = NULL, $static_file_name = "")
    {
        $new_filename = unique_filename($target_path, $file_name);
        //if not provide any source path we'll fi   nd the default path
        if (!$source_path) {
            $source_path = getcwd() . "/uploads/temp/" . $file_name;
        }

        //check destination directory. if not found try to create a new one
        if (!is_dir($target_path)) {
            if (!mkdir($target_path, 0777, true)) {
                die('Failed to create file folders.');
            }
        }

        //overwrite extisting logic and use static file name
        if ($static_file_name) {
            $new_filename = $static_file_name;
        }

        //check the file type is data or file. then copy to destination and remove temp file
        if (starts_with($source_path, "data")) {
            copy_text_based_image($source_path, $target_path . $new_filename);
            return $new_filename;
        } else {
            if (file_exists($source_path)) {
                copy($source_path, $target_path . $new_filename);
                unlink($source_path);
                return $new_filename;
            }
        }
        return false;
    }

}
/**
 * Convert to a file from text based image
 *
 * @param string $source_path
 * @param string $target_path
 * @return file size
 */
if (!function_exists('copy_text_based_image')) {

    function copy_text_based_image($source_path, $target_path)
    {
        $buffer_size = 3145728;
        $byte_number = 0;
        $file_open = fopen($source_path, "rb");
        $file_wirte = fopen($target_path, "w");
        while (!feof($file_open)) {
            $byte_number += fwrite($file_wirte, fread($file_open, $buffer_size));
        }
        fclose($file_open);
        fclose($file_wirte);
        return $byte_number;
    }

}
/**
 * check if a string starts with a specified sting
 *
 * @param string $string
 * @param string $needle
 * @return true/false
 */
if (!function_exists('starts_with')) {

    function starts_with($string, $needle)
    {
        $string = $string;
        return $needle === "" || strrpos($string, $needle, -strlen($string)) !== false;
    }

}

/**
 * check the file type is valid for upload
 *
 * @param string $file_name
 * @return true/false
 */
if (!function_exists('is_valid_file_to_upload')) {

    function is_valid_file_to_upload($file_name = "")
    {

        if (!$file_name)
            return false;

        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $file_formates = explode('|', config_item('allowed_files'));
        if (in_array($file_ext, $file_formates)) {
            return true;
        }
    }

}
/**
 * Validate the image
 *
 * @return    bool
 */
function check_image_extension($image)
{

    $images_extentions = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "gif", "GIF", "bmp", "BMP");

    $image_parts = explode(".", $image);

    $image_end_part = end($image_parts);

    if (in_array($image_end_part, $images_extentions) == true) {
        return 1;
    } else {
        return 0;
    }


}

/**
 * upload a file to temp folder when using dropzone autoque=true
 *
 * @param file $_FILES
 * @return void
 */
if (!function_exists('upload_file_to_temp')) {

    function upload_file_to_temp()
    {
        if (!empty($_FILES)) {
            $temp_file = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];

            if (!is_valid_file_to_upload($file_name))
                return false;

            $target_path = getcwd() . '/uploads/temp/';
            if (!is_dir($target_path)) {
                if (!mkdir($target_path, 0777, true)) {
                    die('Failed to create file folders.');
                }
            }
            $target_file = $target_path . $file_name;
            copy($temp_file, $target_file);
        }
    }

}
/**
 * Supported html5 video extensions
 * @return array
 */
function get_html5_video_extensions()
{

    return do_action('html5_video_extensions',
        array(
            'mp4',
            'm4v',
            'webm',
            'ogv',
            'ogg',
            'flv'
        ));
}

/**
 * Check if filename/path is video file
 * @param  string $path
 * @return boolean
 */
function is_html5_video($path)
{
    $ext = _get_file_extension($path);
    if (in_array($ext, get_html5_video_extensions())) {
        return true;
    }
    return false;
}

/**
 * Get file extension by filename
 * @param  string $file_name file name
 * @return mixed
 */
function _get_file_extension($file_name)
{
    return substr(strrchr($file_name, '.'), 1);
}

/**
 * Function used to validate all recaptcha from google reCAPTCHA feature
 * @param  string $str
 * @return boolean
 */
function do_recaptcha_validation($str = '')
{
    $CI =& get_instance();
    $CI->load->library('form_validation');
    $google_url = "https://www.google.com/recaptcha/api/siteverify";
    $secret = config_item('recaptcha_secret_key');
    $ip = $CI->input->ip_address();
    $url = $google_url . "?secret=" . $secret . "&response=" . $str . "&remoteip=" . $ip;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    $res = curl_exec($curl);
    curl_close($curl);
    $res = json_decode($res, true);
    //reCaptcha success check
    if ($res['success']) {
        return true;
    } else {
        $CI->form_validation->set_message('recaptcha', lang('recaptcha_error'));
        return false;
    }
}

function MyDetails($user_id = null)
{
    $CI =& get_instance();
    $CI->db->select('tbl_users.*', FALSE);
    $CI->db->select('tbl_account_details.*', FALSE);
    $CI->db->select('tbl_designations.departments_id', FALSE);
    $CI->db->from('tbl_users');
    $CI->db->join('tbl_account_details', 'tbl_users.user_id = tbl_account_details.user_id', 'left');
    $CI->db->join('tbl_designations', 'tbl_designations.designations_id = tbl_account_details.designations_id', 'left');
    if (empty($user_id)) {
        $user_id = $CI->session->userdata('user_id');
    }
    $CI->db->where('tbl_users.user_id', $user_id);
    $CI->db->where('tbl_users.role_id !=', 2);
    $CI->db->where('tbl_users.activated', 1);
    $query_result = $CI->db->get();
    return $query_result->row();

}

function get_staff_details($user_id = null)
{
    $CI =& get_instance();
    $CI->db->select('tbl_users.*', FALSE);
    $CI->db->select('tbl_account_details.*', FALSE);
    $CI->db->from('tbl_users');
    $CI->db->join('tbl_account_details', 'tbl_users.user_id = tbl_account_details.user_id', 'left');
    if (!empty($user_id)) {
        $CI->db->where('tbl_users.user_id', $user_id);
        $query_result = $CI->db->get();
        $result = $query_result->row();
    } else {
        $CI->db->where('tbl_users.role_id !=', 2);
        $CI->db->where('tbl_users.activated', 1);
        $query_result = $CI->db->get();
        $result = $query_result->result();
    }
    return $result;
}

/**
 * prepare a anchor tag for ajax request
 *
 * @param string $url
 * @param string $title
 * @param array $attributes
 * @return html link of anchor tag
 */
if (!function_exists('ajax_anchor')) {

    function ajax_anchor($url, $title = '', $attributes = '')
    {
        $attributes["data-act"] = "ajax-request";
        $attributes["data-action-url"] = $url;
        return js_anchor($title, $attributes);
    }

}

/**
 * prepare a anchor tag for any js request
 *
 * @param string $title
 * @param array $attributes
 * @return html link of anchor tag
 */
if (!function_exists('js_anchor')) {

    function js_anchor($title = '', $attributes = '')
    {
        $title = (string)$title;

        $html_attributes = "";
        if (is_array($attributes)) {
            foreach ($attributes as $key => $value) {
                $html_attributes .= ' ' . $key . '="' . $value . '"';
            }
        }
        return '<strong data-toggle="tooltip" data-placement="top" style="cursor:pointer"' . $html_attributes . '>' . $title . '</strong>';
    }

}
/**
 * prepare a anchor tag for any js request
 *
 * @param string $title
 * @param array $attributes
 * @return html link of anchor tag
 */
if (!function_exists('remove_files')) {

    function remove_files($fileName, $dir = null)
    {
        //Delete the file
        if (empty($dir)) {
            $dir = 'uploads/';
        }
        if (is_file($dir . $fileName)) {
            unlink($dir . $fileName);
        }
        return true;
    }

}
function get_result($tbl, $where = null, $type = null)
{
    $CI =& get_instance();
    $CI->db->select('*');
    $CI->db->from($tbl);
    if (!empty($where) && $where != 0) {
        $CI->db->where($where);
    }
    $query_result = $CI->db->get();
    if (!empty($type)) {
        $result = $query_result->row();
    } else {
        $result = $query_result->result();
    }
    return $result;
}

function read_more($str, $limit, $url)
{
    // strip tags to avoid breaking any html
    $string = strip_tags($str);
    if (strlen($string) > $limit) {
        // truncate string
        $stringCut = substr($string, 0, $limit);
        // make sure it ends in a word so assassinate doesn't become ass...
        $string = substr($stringCut, 0, strrpos($stringCut, ' ')) . '... <a href="' . base_url($url) . '">' . lang('read_more') . '</a>';
    }
    return $string;
}

if (!function_exists('cal_days_in_month')) {
    function cal_days_in_month($calendar, $month, $year)
    {
        return date('t', mktime(0, 0, 0, $month, 1, $year));
    }
}
if (!defined('CAL_GREGORIAN'))
    define('CAL_GREGORIAN', 1);

function leave_report($id = null)
{
    $CI =& get_instance();
    $office_hours = config_item('office_hours');
    $all_category = $CI->db->get('tbl_leave_category')->result();
    $result = array();
    foreach ($all_category as $v_category) {
        if (!empty($id)) {
            $where = array('user_id' => $id, 'leave_category_id' => $v_category->leave_category_id, 'application_status' => 2);
        } else {
            $where = array('leave_category_id' => $v_category->leave_category_id, 'application_status' => 2);
        }
        $all_leave_info = $CI->db->where($where)->get('tbl_leave_application')->result();

        $total_days = 0;
        $total_hours = 0;
        if (!empty($all_leave_info)) {
            $ge_days = 0;
            $m_days = 0;
            foreach ($all_leave_info as $v_leave) {
                if ($v_leave->leave_type != 'hours') {
                    $month = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime($v_leave->leave_start_date)), date('Y', strtotime($v_leave->leave_start_date)));
                    $datetime1 = new DateTime($v_leave->leave_start_date);
                    if (empty($v_leave->leave_end_date)) {
                        $v_leave->leave_end_date = $v_leave->leave_start_date;
                    }
                    $datetime2 = new DateTime($v_leave->leave_end_date);
                    $difference = $datetime1->diff($datetime2);

                    if ($difference->m != 0) {
                        $m_days += $month;
                    } else {
                        $m_days = 0;
                    }
                    $ge_days += $difference->d + 1;
                    $total_days = $m_days + $ge_days;
                }

                if ($v_leave->leave_type == 'hours') {
                    $total_hours += ($v_leave->hours / $office_hours);
                }

            }
            if (empty($total_days)) {
                $total_days = 0;
            }
            if (empty($total_hours)) {
                $total_hours = 0;
            } else {
                $total_hours = number_format($total_hours, 2);
            }
        }
        $result['leave_category'][] = $v_category->leave_category;
        $result['leave_quota'][] = $v_category->leave_quota;
        $result['leave_taken'][] = $total_days + $total_hours;
    }
    return $result;
}

function get_any_field($table, $where, $table_field)
{
    $CI =& get_instance();
    $query = $CI->db->select($table_field)->where($where)->get($table);
    if ($query->num_rows() > 0) {
        $row = $query->row();
        return $row->$table_field;
    }
}

function get_row($table, $where, $fields = null)
{
    $CI =& get_instance();
    $query = $CI->db->where($where)->get($table);
    if ($query->num_rows() > 0) {
        $row = $query->row();
        if (!empty($fields)) {
            return $row->$fields;
        } else {
            return $row;
        }
    }
}

function update($table, $where, $data)
{
    $CI =& get_instance();
    $CI->db->where($where);
    $CI->db->update($table, $data);
}

function delete($table, $where)
{
    $CI =& get_instance();
    $CI->db->where($where);
    $CI->db->delete($table);
}

function convert_currency($currency, $amount)
{
    if (empty($currency)) {
        return $amount;
    }
    if ($currency == config_item('default_currency')) {
        return $amount;
    }
    $CI =& get_instance();
    $currency_info = $CI->db->where('code', config_item('default_currency'))->get('tbl_currencies')->row();
    if ($currency_info->xrate > 0) {
        $in_local_cur = $amount * $currency_info->xrate;
        $convert_currency = $CI->db->where('code', $currency)->get('currencies')->row();
        $in_local = $in_local_cur / $convert_currency->xrate;
        return $in_local;
    } else {
        return $amount;
    }
}
