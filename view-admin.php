<?php

$buttonsSettings    = get_option('cub_buttonsSettings');
$mainButtonSettings = get_option('cub_mainButtonSettings');
$settings           = get_option('cub_settings');

?>
<style>
    input[type="text"]::placeholder {
        color: #C5CEE1 !important;
    }
</style>

<div class="wrap">
    <h1> <?php
        echo get_admin_page_title() ?> </h1>
    <p>Разрабочик — <a href="https://t.me/edgar_vvv">Edgar Podosyan</a></p>
    <form name="contact_us_button_options_form" method="post" action="<?php
    echo $_SERVER['PHP_SELF']; ?>?page=contact-us-button-options&amp;updated=true">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row">
                    <label>Цвет главной кнопки (Hex)</label>
                </th>
                <td>
                    <input placeholder="#9E7B71"
                           name="contact_us_button_options_main_button_color" type="text"
                           value="<?php
                           echo $mainButtonSettings ? htmlspecialchars(
                               $mainButtonSettings['contact_us_button_options_main_button_color']
                           ) : ''; ?>">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label>Иконка главной кнопки (Hex)</label>
                </th>
                <td>
                    <input placeholder="<i class='fab fa-font-awesome-flag'></i>"
                           name="contact_us_button_options_main_button_logo" type="text"
                           value="<?php
                           echo $mainButtonSettings ? htmlspecialchars(
                               $mainButtonSettings['contact_us_button_options_main_button_logo']
                           ) : ''; ?>">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label>Отключить библиотеку FontAwesome</label>
                </th>
                <td>
                    <input name="contact_us_button_options_library_disable" type="checkbox" <?php
                    echo $settings ?? ''; ?>>
                </td>
            </tr>
            </tbody>
        </table>
        <p style="color:red;"><strong>Могут возникнуть проблемы, если на сайте уже установлена библиотека FontAwesome.
                Рекомендуется отключить
                библиотеку в настройках данного плагина и прописывать в соответствующих полях ниже иконки от той версии
                FontAwesome, которая подключена вместе с темой вашего сайта.</strong></p>
        <table width="100%" border="0" cellpadding="0" cellspacing="0"
               style="margin-top:40px; border-spacing: 5px 1rem;">
            <thead>
            <tr>
                <th style="text-align:center">Название кнопки (любое)</th>
                <th style="text-align:center">Ссылка</th>
                <th style="text-align:center">Цвет (Hex)</th>
                <th style="text-align:center">Иконка (<a target="_blank"
                                                         href="https://fontawesome.com/v5/search?o=r&m=free">FontAwesome
                        v5.15.4</a>)
                </th>
            </tr>
            </thead>
            <tbody class="seo-contact-us-options-wrap" align="center">
            <?php
            if ($buttonsSettings): ?>
                <?php
                foreach ($buttonsSettings as $a => $button): ?>
                    <tr class="seo-contact-us-options-field">
                        <td style="border: 1px solid #dee2e6;padding: .3rem;">
                            <input placeholder="WhatsApp" id="" name="contact_us_button_options_name_<?php
                            echo $a == 0 ? '' : $a; ?>" type="text"
                                   value="<?php
                                   echo $button['contact_us_button_options_name'] ?? ''; ?>" style="width:95%" required>
                        </td>
                        <td style="border: 1px solid #dee2e6;padding: .3rem;">
                            <input placeholder="tel:7 (701) 607-00-41" class="contact_us_button_options_a"
                                   name="contact_us_button_options_a_<?php
                                   echo $a == 0 ? '' : $a; ?>" type="text"
                                   value="<?php
                                   echo $button['contact_us_button_options_a'] ?? ''; ?>"
                                   style="width:95%" required>
                        </td>
                        <td style="border: 1px solid #dee2e6;padding: .3rem;">
                            <input placeholder="#9E7B71" id="" name="contact_us_button_options_color_<?php
                            echo $a == 0 ? '' : $a; ?>" type="text"
                                   value="<?php
                                   echo $button['contact_us_button_options_color'] ?? ''; ?>" style="width:95%"
                                   required>
                        </td>
                        <td style="border: 1px solid #dee2e6;padding: .3rem;">
                            <input placeholder="<i class='fab fa-font-awesome-flag'></i>" id=""
                                   name="contact_us_button_options_logo_<?php
                                   echo $a == 0 ? '' : $a; ?>" type="text"
                                   value="<?php
                                   echo htmlspecialchars($button['contact_us_button_options_logo']) ?? ''; ?>"
                                   style="width:95%"
                                   required>
                        </td>
                        <td style="width: 40px">
                            <button type="button" class="remove-seo-contact-us-options-field button button-primary">
                                Удалить кнопку
                            </button>
                        </td>
                    </tr>
                <?php
                endforeach; ?>
            <?php
            else: ?>
                <tr class="seo-contact-us-options-field">
                    <td style="border: 1px solid #dee2e6;padding: .3rem;">
                        <input placeholder="WhatsApp" id="" name="contact_us_button_options_name_" type="text"
                               value="" style="width:95%" required>
                    </td>
                    <td style="border: 1px solid #dee2e6;padding: .3rem;">
                        <input placeholder="tel:7 (701) 607-00-41" class="contact_us_button_options_a"
                               name="contact_us_button_options_a_" type="text"
                               value="" style="width:95%" required>
                    </td>
                    <td style="border: 1px solid #dee2e6;padding: .3rem;">
                        <input placeholder="#9E7B71" id="" name="contact_us_button_options_color_" type="text"
                               value="" style="width:95%" required>
                    </td>
                    <td style="border: 1px solid #dee2e6;padding: .3rem;">
                        <input placeholder="<i class='fab fa-font-awesome-flag'></i>" id=""
                               name="contact_us_button_options_logo_" type="text"
                               value="" style="width:95%"
                               required>
                    </td>
                    <td style="width: 40px">
                        <button type="button" class="remove-seo-contact-us-options-field button button-primary">Удалить
                            кнопку
                        </button>
                    </td>
                </tr>
            <?php
            endif; ?>
            </tbody>
        </table>
        <button type="button" class="add-seo-contact-us-options-field button button-primary" style="margin-top:40px">
            Добавить еще кнопку
        </button>
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить изменения">
        </p>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<div style='padding-left: 20px;color: green;margin-bottom: 40px;'><p style='font-size: 18px;font-weight: bold;'>Настройки сохранены!</p></div>";
} ?>

<?php
require_once plugin_dir_path(__FILE__) . '/helper-admin.php'; ?>

<script src="<?php
echo plugins_url("/assets/js/contact-us-button-admin-scripts.js", __FILE__) ?>"></script>