

const copyLink = (id) => {
    var copyText = document.getElementById(`link${id}`);

    navigator.clipboard.writeText(copyText.value);

    $('#copiedToast').toast('show')
};