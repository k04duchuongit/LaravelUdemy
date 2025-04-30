const selectedContact = $('meta[name="selected_contact"]');
const authId = $('meta[name="auth_id"]').attr('content');
const baseUrl = $('meta[name="base_url"]').attr('content');
const inbox = $('.messages ul'); // dữ liệu ô nhập tin nhắn


function toggleLoader() {              // hàm này dùng để hiển thị loading khi gọi ajax
    $('.loader').toggleClass('d-none');
}

function messageTemplate(text, className) {
    return `<li class="${className}"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>${text}</p></li>`
}

function fetchMessage() {                                               //ajax để gọi đến route php và lấy dữ liệu người dùng
    const contactId = selectedContact.attr('content');
    $.ajax({
        method: 'GET',
        url: baseUrl + '/fetch-messages/',
        data: {
            contact_id: contactId,
        },
        beforeSend: function () {
            toggleLoader();
        },
        success: function (data) {
            setContactInfo(data.contact);
            inbox.empty();                                          // xóa dữ liệu trong ô nhập tin nhắn
            data.messages.forEach(value => {                       // đẩy dữ liệu vào ô chat
                if (value.form_id == contactId) {                 // nếu người gửi là người dùng thì hiển thị bên trái
                    inbox.append(messageTemplate(value.message, 'sent'));
                }
                else {
                    inbox.append(messageTemplate(value.message, 'replies'));
                }

            })
        },
        complete: function () {
            toggleLoader();
        },
        error: function (xhr, status, text) { },

    });
}

function setContactInfo(contact) {                                   // hàm này dùng để hiển thị tên người dùng trong khung chat
    $('.contact-name').text(contact.name)
}

function sendMessage() {                                            // hàm này dùng để gửi tin nhắn đến người dùng

    const contactId = selectedContact.attr('content');           // id người đối diện
    let formData = $('.message-form').serialize();                 // lấy dữ liệu từ form gửi tin nhắn

    let messangeBox = $('.message-box');                          // lấy dữ liệu từ ô nhập tin nhắn

    $.ajax({
        method: 'POST',
        url: baseUrl + '/send-message',
        data: formData + '&contact_id=' + contactId,

        beforeSend: function () {                                 // hiển thị loading khi gửi tin nhắn ̣̣(tin nhắn gửi đi sẽ hiện ngay không cần đợi phản hồi từ server)
            let messange = messangeBox.val();                     // lấy dữ liệu từ ô nhập tin nhắn

            inbox.append(messageTemplate(messange, 'replies'));   // đẩy tin nhắn vào ô chat
            messangeBox.val('');                                  // xóa dữ liệu ô nhập tin nhắn
        },
        success: function (data) {

        },
        complete: function () {

        },
        error: function (xhr, status, text) { },

    });
}


$(document).ready(function () {
    $('.contact').on('click', function () {                // truyền id lên meta và gọi đến ajax
        const contactId = $(this).data('id');
        selectedContact.attr('content', contactId);



        //ẩn lớp phủ khi chưa chọn người nhắn tin
        $('.blank-wrap').addClass('d-none');

        //fetch message
        fetchMessage();                                  // gọi đến hàm fetchMessage để lấy dữ liệu người dùng
    });

    $('.message-form').on('submit', function (e) {      // khi gửi tin nhắn thì gọi đến hàm sendMessage
        e.preventDefault();
        sendMessage();
    });

});

// listen to the live message
window.Echo.private('message.' + authId)
    .listen('SendMessageEvent', (e) => {
        if (e.from_id == selectedContact.attr('content')) { // nếu id người gửi là id người dùng đang chat thì mới hiển thị tin nhắn
            inbox.append(messageTemplate(e.text, 'sent')); // đẩy tin nhắn vào ô chat
            console.log(e);

        }
    })


window.Echo.join('online')
    .here(users => {
        users.forEach(user => {

            let element = $(`.contact[data-id="${user.id}"]`);
            if (element.length > 0) {
                element.find('.contact-status').removeClass('offline').addClass('online');
            } else {
                element.find('.contact-status').removeClass('online').addClass('offline');
            }
        });
    })
    .joining(user => {
        let element = $(`.contact[data-id="${user.id}"]`);
        element.find('.contact-status').removeClass('offline').addClass('online');
    })
    .leaving(user => {
        let element = $(`.contact[data-id="${user.id}"]`);
        element.find('.contact-status').removeClass('online').addClass('offline');
    });
