

//добавление
let AddSEOContactUsOptionsField = document.querySelector('.add-seo-contact-us-options-field');
let AddSEOContactUsOptionsFieldCount = document.querySelectorAll('.seo-contact-us-options-field').length;
AddSEOContactUsOptionsField.addEventListener('click',
    () => {
        let SEOContactUsButtonField = document.querySelector('.seo-contact-us-options-field:first-child');
        let SEOContactUsOptionsWrap = document.querySelector('.seo-contact-us-options-wrap');
        let SEOContactUsButtonFieldClone = SEOContactUsButtonField.cloneNode(true);
        SEOContactUsOptionsWrap.append(SEOContactUsButtonFieldClone);
        let AllInputsSEOContactUsButtonFieldClone = SEOContactUsButtonFieldClone.querySelectorAll('input');
        for (let InputSEOContactUsButtonFieldClone of AllInputsSEOContactUsButtonFieldClone){
               InputSEOContactUsButtonFieldClone.value = "";
               let Attribute_Name = InputSEOContactUsButtonFieldClone.getAttribute('name');
               InputSEOContactUsButtonFieldClone.setAttribute('name', Attribute_Name + AddSEOContactUsOptionsFieldCount);
        }
        AddSEOContactUsOptionsFieldCount = AddSEOContactUsOptionsFieldCount + 1;
    }
);


//удаление 
window.addEventListener('click', e => {
      if (document.querySelectorAll('.seo-contact-us-options-field').length > 1 && e.target.classList.contains('remove-seo-contact-us-options-field')){
          e.target.closest('.seo-contact-us-options-field').remove();
      }
  }
);


//перед отправкой формы кодирует в base64 значения в полях ссылок
document.querySelector('form[name="contact_us_button_options_form"]').addEventListener('submit', () => {
        let aSEOContactUsOptionsField = document.querySelectorAll('.contact_us_button_options_a');
        for (let InputaSEOContactUsOptionsField of aSEOContactUsOptionsField){
            InputaSEOContactUsOptionsField.value = window.btoa(InputaSEOContactUsOptionsField.value);
        }
    }
);


 
//копирование кода иконок в блоке подсказок  
document.getElementById("Viber").onclick = function() {
  navigator.clipboard.writeText('<i class="fa-brands fa-viber"></i>')
}
document.getElementById("Skype").onclick = function() {
  navigator.clipboard.writeText('<i class="fa-brands fa-skype"></i>')
}
document.getElementById("WhatsApp").onclick = function() {
  navigator.clipboard.writeText('<i class="fa-brands fa-whatsapp"></i>')
}
document.getElementById("Telegram").onclick = function() {
  navigator.clipboard.writeText('<i class="fa-brands fa-telegram"></i>')
}
document.getElementById("Facebook").onclick = function() {
  navigator.clipboard.writeText('<i class="fa-brands fa-facebook-messenger"></i>')
}
document.getElementById("Instagram").onclick = function() {
  navigator.clipboard.writeText('<i class="fab fa-instagram-square"></i>')
}
document.getElementById("VK").onclick = function() {
  navigator.clipboard.writeText('<i class="fab fa-vk"></i>')
}
document.getElementById("TikTok").onclick = function() {
  navigator.clipboard.writeText('<i class="fab fa-tiktok"></i>')
}
document.getElementById("Twitter").onclick = function() {
  navigator.clipboard.writeText('<i class="fab fa-twitter"></i>')
}
document.getElementById("WeChat").onclick = function() {
  navigator.clipboard.writeText('<i class="fab fa-weixin"></i>')
}
document.getElementById("YouTube").onclick = function() {
  navigator.clipboard.writeText('<i class="fab fa-youtube"></i>')
}
document.getElementById("Email").onclick = function() {
  navigator.clipboard.writeText('<i class="fa-solid fa-envelope"></i>')
}
document.getElementById("PhoneCall").onclick = function() {
  navigator.clipboard.writeText('<i class="fa-solid fa-phone"></i>')
}
document.getElementById("SMS").onclick = function() {
  navigator.clipboard.writeText('<i class="fa-solid fa-comment-sms"></i>')
}



//копирование цветового кода в блоке подсказок  
document.getElementById("ViberColor").onclick = function() {
    navigator.clipboard.writeText('#7A55E3')
}
document.getElementById("SkypeColor").onclick = function() {
    navigator.clipboard.writeText('#00A9EB')
}
document.getElementById("WhatsAppColor").onclick = function() {
    navigator.clipboard.writeText('#1EBB49')
}
document.getElementById("TelegramColor").onclick = function() {
    navigator.clipboard.writeText('#29A1DB')
}
document.getElementById("FacebookColor").onclick = function() {
    navigator.clipboard.writeText('#007BF7')
}
document.getElementById("InstagramColor").onclick = function() {
    navigator.clipboard.writeText('#F51E93')
}
document.getElementById("VKColor").onclick = function() {
  navigator.clipboard.writeText('#0077FF')
}
document.getElementById("TikTokColor").onclick = function() {
  navigator.clipboard.writeText('#000000')
}
document.getElementById("TwitterColor").onclick = function() {
  navigator.clipboard.writeText('#1DA1F2')
}
document.getElementById("WeChatColor").onclick = function() {
  navigator.clipboard.writeText('#2DBB01')
}
document.getElementById("YouTubeColor").onclick = function() {
  navigator.clipboard.writeText('#FF0000')
}
document.getElementById("EmailColor").onclick = function() {
    navigator.clipboard.writeText('#E61F23')
}
document.getElementById("PhoneCallColor").onclick = function() {
    navigator.clipboard.writeText('#008000')
}
document.getElementById("SMSColor").onclick = function() {
    navigator.clipboard.writeText('#03D5B9')
}
