// Hàm để xử lý click và hành động
function handleFilterClick(btn, options, input) {
    btn.click(function (event) {
        event.preventDefault();
        // $(".btn-filter_search").prop("disabled", true);
        if (input) {
            input.val("");
        }
        options.toggle();
    });
}
// Hàm cho nút hủy
function handleCancelClick(cancelBtn, input, options) {
    cancelBtn.click(function (event) {
        event.preventDefault();
        // $(".btn-filter_search").prop("disabled", false);
        if (input) {
            input.val("");
        }
        options.hide();
    });
}
$(document).on("click", function (event) {
    if (
        !$(event.target).closest(".dropdown-menu,.block-options,.item-filter")
            .length
    ) {
        $(".block-options").hide();
        $(".btn-filter_search").prop("disabled", false);
    } else if ($(event.target).closest(".important-style").length) {
    }
});
// Click show hide
$(document).on("click", ".btndropdown", function (e) {
    e.preventDefault();
    var buttonName = $(this).data("button");
    var absoluteItem = $("#" + buttonName + "-options");
    $(".filter-all").append(absoluteItem);
});

$(document).on("click", ".item-icon, span", function (e) {
    e.preventDefault();
    var parentItem = $(this).closest(".item-filter");
    var buttonName = parentItem.data("button");
    // var absoluteItem = $("#" + buttonName + "-options");
    // absoluteItem.addClass("important-style");
    // absoluteItem.appendTo(parentItem);
    if (
        !$(e.target).closest(
            "#cancel-" + buttonName + ",.block-options," + "#" + buttonName
        ).length
    ) {
        $("#" + buttonName + "-options").toggle();
    }
    var buttonreport = parentItem.data("report");
    if (buttonreport) {
        console.log("#" + buttonName + "-" + buttonreport + "-options");
    }
});

$(document).on("click", ".fa-xmark", function (e) {
    e.preventDefault();
    var buttonName = $(this).data("delete");
    var absoluteItem = $("#" + buttonName + "-options");
    $(".filter-all").append(absoluteItem);
});

$(".btn-filter_search").click(function () {
    $(".block-options").hide();
});

function addIcon(event, icon) {
    var itemIcon = $("<div>").addClass("item-icon").html(icon);
    $(event.target).addClass("new-class").prepend(itemIcon);
}
$(document).ready(function () {
    var svgstatus =
        "<svg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
        "<path d='M14.9408 8.91426L12.9576 8.65557C12.9855 8.4419 13 8.22314 13 8C13 7.77686 12.9855 7.5581 12.9576 7.34443L14.9408 7.08573C14.9799 7.38496 15 7.69013 15 8C15 8.30987 14.9799 8.61504 14.9408 8.91426ZM14.4688 5.32049C14.2328 4.7514 13.9239 4.22019 13.5538 3.73851L11.968 4.95716C12.2328 5.30185 12.4533 5.68119 12.6214 6.08659L14.4688 5.32049ZM12.2615 2.4462L11.0428 4.03204C10.6981 3.76716 10.3188 3.54673 9.91341 3.37862L10.6795 1.53116C11.2486 1.76715 11.7798 2.07605 12.2615 2.4462ZM8.91426 1.05917L8.65557 3.04237C8.4419 3.01449 8.22314 3 8 3C7.77686 3 7.5581 3.01449 7.34443 3.04237L7.08574 1.05917C7.38496 1.02013 7.69013 1 8 1C8.30987 1 8.61504 1.02013 8.91426 1.05917ZM5.32049 1.53116L6.08659 3.37862C5.68119 3.54673 5.30185 3.76716 4.95716 4.03204L3.73851 2.4462C4.22019 2.07605 4.7514 1.76715 5.32049 1.53116ZM2.4462 3.73851L4.03204 4.95716C3.76716 5.30185 3.54673 5.68119 3.37862 6.08659L1.53116 5.32049C1.76715 4.7514 2.07605 4.22019 2.4462 3.73851ZM1.05917 7.08574C1.02013 7.38496 1 7.69013 1 8C1 8.30987 1.02013 8.61504 1.05917 8.91426L3.04237 8.65557C3.01449 8.4419 3 8.22314 3 8C3 7.77686 3.01449 7.5581 3.04237 7.34443L1.05917 7.08574ZM1.53116 10.6795L3.37862 9.91341C3.54673 10.3188 3.76716 10.6981 4.03204 11.0428L2.4462 12.2615C2.07605 11.7798 1.76715 11.2486 1.53116 10.6795ZM3.73851 13.5538L4.95716 11.968C5.30185 12.2328 5.68119 12.4533 6.08659 12.6214L5.32049 14.4688C4.7514 14.2328 4.22019 13.9239 3.73851 13.5538ZM7.08574 14.9408L7.34443 12.9576C7.5581 12.9855 7.77686 13 8 13C8.22314 13 8.4419 12.9855 8.65557 12.9576L8.91427 14.9408C8.61504 14.9799 8.30987 15 8 15C7.69013 15 7.38496 14.9799 7.08574 14.9408ZM10.6795 14.4688L9.91341 12.6214C10.3188 12.4533 10.6981 12.2328 11.0428 11.968L12.2615 13.5538C11.7798 13.9239 11.2486 14.2328 10.6795 14.4688ZM13.5538 12.2615L11.968 11.0428C12.2328 10.6981 12.4533 10.3188 12.6214 9.91341L14.4688 10.6795C14.2328 11.2486 13.924 11.7798 13.5538 12.2615Z' fill='#6D7075'/>" +
        "</svg>";
    svgmoney =
        "<svg width='17' height='16' viewBox='0 0 17 16' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
        "<path d='M12.2959 10.1476C12.2959 11.6563 11.2901 12.7165 10.026 13.1379V14C10.026 14.5523 9.57828 15 9.026 15H8.68813C8.13585 15 7.68813 14.5523 7.68813 14V13.1922C6.79104 12.9204 5.94833 12.3087 5.2959 11.2893L6.83182 9.86214C7.34833 10.7049 8.00075 11.1806 8.68036 11.1806C9.41434 11.1806 9.91726 10.8408 9.91726 10.1204C9.91726 8.65243 5.62211 9.4 5.62211 5.93398C5.62211 4.45243 6.53279 3.41942 7.68813 2.98447V2C7.68813 1.44772 8.13585 1 8.68813 1H9.026C9.57828 1 10.026 1.44772 10.026 2V2.9301C10.8551 3.20194 11.6299 3.81359 12.2415 4.81942L10.7056 6.2466C10.325 5.40388 9.64541 4.90097 9.03376 4.90097C8.39493 4.90097 7.90561 5.22718 7.90561 5.92039C7.90561 7.36117 12.2959 6.74951 12.2959 10.1476Z' fill='#6D7075'/>" +
        "</svg>";
    svgdate =
        "<svg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
        "<path d='M11 1C13.2091 1 15 2.79086 15 5V11C15 13.2091 13.2091 15 11 15H5C2.79086 15 1 13.2091 1 11V5C1 2.79086 2.79086 1 5 1H11ZM13.5 6H2.5V11C2.5 12.3807 3.61929 13.5 5 13.5H11C12.3807 13.5 13.5 12.3807 13.5 11V6Z' fill='#6D7075'/>" +
        "</svg>";
    svgsl =
        "<svg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
        "<path d='M5.90628 2.14727C4.05316 2.82852 0.381282 4.20039 0.312532 4.23477C0.112532 4.33789 0.125032 4.11602 0.125032 8.00039C0.125032 11.2004 0.131282 11.5473 0.175032 11.6223C0.203157 11.6691 0.253157 11.7254 0.287532 11.7473C0.434407 11.8379 5.89691 13.8535 6.00003 13.8535C6.06253 13.8535 6.56566 13.6848 7.20316 13.4441C7.80628 13.2191 9.05628 12.7535 9.98441 12.4066C11.3407 11.9035 11.6907 11.7598 11.7657 11.6848L11.8594 11.5941L11.8688 8.04414C11.8782 4.00352 11.9 4.33164 11.6125 4.20039C11.4563 4.13164 6.66878 2.35039 6.23753 2.20039C6.01253 2.12227 5.98441 2.11914 5.90628 2.14727ZM8.22816 3.73477C9.48441 4.20039 10.3907 4.55352 10.3688 4.56602C10.3 4.60352 6.03441 6.18789 6.00316 6.18789C5.97503 6.18789 1.95628 4.69727 1.69378 4.59102C1.59066 4.54727 1.61253 4.53789 3.78753 3.72852C4.99378 3.27852 6.00003 2.91289 6.01566 2.91914C6.03441 2.92227 7.02816 3.29102 8.22816 3.73477ZM3.27816 5.98477L5.62503 6.85977V9.89727C5.62503 11.5691 5.61878 12.9379 5.61253 12.9379C5.60316 12.9379 4.65003 12.5848 3.49378 12.1535C2.33753 11.7223 1.27503 11.3285 1.13441 11.2754L0.875032 11.1816V8.13477C0.875032 6.32852 0.887532 5.09414 0.903157 5.10039C0.918782 5.10352 1.98753 5.50352 3.27816 5.98477ZM11.125 8.13789C11.125 11.0066 11.1219 11.1816 11.0719 11.2035C10.8782 11.2785 6.47503 12.916 6.43128 12.9285C6.37816 12.9441 6.37503 12.7848 6.37503 9.90352V6.85977L7.93128 6.28164C8.78441 5.96289 9.84378 5.56914 10.2813 5.40352C10.7188 5.23789 11.0875 5.10039 11.1032 5.09727C11.1157 5.09414 11.125 6.46289 11.125 8.13789Z' fill='#6D7075'/>" +
        "<path d='M14.3594 5.15313C14.325 5.16875 14.2625 5.21875 14.2188 5.26563C14.1469 5.34375 14.1407 5.37188 14.1313 5.7375L14.1188 6.125H13.7938C13.4125 6.125 13.2813 6.16563 13.1875 6.31875C13.1125 6.44063 13.1094 6.5625 13.1719 6.6875C13.25 6.84063 13.3594 6.875 13.7657 6.875H14.125V7.23438C14.125 7.7375 14.2063 7.875 14.5 7.875C14.7938 7.875 14.875 7.7375 14.875 7.23438V6.875H15.2344C15.6532 6.875 15.7594 6.8375 15.8313 6.67188C15.8907 6.525 15.8875 6.44063 15.8125 6.31875C15.7188 6.16563 15.5875 6.125 15.2063 6.125H14.8813L14.8688 5.73438C14.8594 5.34688 14.8594 5.34375 14.7625 5.24688C14.6594 5.14375 14.475 5.10313 14.3594 5.15313Z' fill='#6D7075'/>" +
        "</svg>";
    svgpo =
        "<svg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
        "<path d='M12.5849 7C13.0499 7 13.4959 7.18511 13.8242 7.51446L14.4893 8.18162C14.8164 8.50966 15 8.95396 15 9.41716V13C15 13.9665 14.2165 14.75 13.25 14.75H9.75C8.7835 14.75 8 13.9665 8 13V8.75C8 7.7835 8.7835 7 9.75 7H12.5849ZM10.7458 1C12.8169 1 14.4958 2.67893 14.4958 4.75V5.24561C14.4958 5.65982 14.1601 5.99561 13.7458 5.99561C13.3316 5.99561 12.9958 5.65982 12.9958 5.24561V4.75C12.9958 3.50736 11.9885 2.5 10.7458 2.5H4.74585C3.50321 2.5 2.49585 3.50736 2.49585 4.75V10.9705C2.49585 12.2131 3.50321 13.2205 4.74585 13.2205H6.05235C6.46656 13.2205 6.80235 13.5562 6.80235 13.9705C6.80235 14.3847 6.46656 14.7205 6.05235 14.7205H4.74585C2.67478 14.7205 0.99585 13.0415 0.99585 10.9705V4.75C0.99585 2.67893 2.67478 1 4.74585 1H10.7458ZM12.5849 8.5H9.75C9.61193 8.5 9.5 8.61193 9.5 8.75V13C9.5 13.1381 9.61193 13.25 9.75 13.25H13.25C13.3881 13.25 13.5 13.1381 13.5 13V9.41716C13.5 9.35099 13.4738 9.28752 13.427 9.24065L12.7619 8.57349C12.715 8.52644 12.6513 8.5 12.5849 8.5ZM12.25 11.5C12.5261 11.5 12.75 11.7239 12.75 12C12.75 12.2761 12.5261 12.5 12.25 12.5H10.75C10.4739 12.5 10.25 12.2761 10.25 12C10.25 11.7239 10.4739 11.5 10.75 11.5H12.25ZM12.25 10C12.5261 10 12.75 10.2239 12.75 10.5C12.75 10.7761 12.5261 11 12.25 11H10.75C10.4739 11 10.25 10.7761 10.25 10.5C10.25 10.2239 10.4739 10 10.75 10H12.25Z' fill='#6D7075'/>" +
        "</svg>";
    svgbh =
        "<svg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
        "<path d='M7.82812 1.04062C7.775 1.06563 7.57812 1.19063 7.39062 1.31875C6.725 1.77187 6.0625 2.125 5.32812 2.41562C4.43125 2.76875 3.66875 2.94063 2.74063 2.99375C2.27813 3.02187 2.22187 3.04062 2.08125 3.23125C2.01562 3.31563 2.01562 3.3375 2.01562 6.10312C2.01562 8.84062 2.01875 8.89687 2.0875 9.33437C2.29375 10.6406 2.7375 11.5312 3.62188 12.4062C4.15937 12.9406 4.69688 13.3375 5.5625 13.8438C6.35938 14.3062 7.82188 15 8 15C8.13125 15 8.51562 14.8312 9.4375 14.3719C12.1031 13.0406 13.325 11.8062 13.7812 9.98125C13.9844 9.1625 13.9844 9.14687 13.9844 6.0875C13.9844 3.3375 13.9844 3.31563 13.9187 3.23125C13.7781 3.04062 13.7219 3.02187 13.2594 2.99375C12.7469 2.96562 12.4781 2.92812 12.0031 2.82187C10.8469 2.56875 9.65938 2.0375 8.56875 1.29375C8.15625 1.00937 8.00938 0.959374 7.82812 1.04062ZM8.22813 2.275C8.64375 2.55312 8.99688 2.75313 9.54063 3.01562C10.5938 3.52187 11.6062 3.81875 12.8531 3.98438L13 4.00313V6.22812C13 7.5 12.9844 8.6125 12.9656 8.82812C12.8125 10.6219 12.0594 11.6844 10.1031 12.8687C9.65625 13.1375 8.0875 13.9375 8.00313 13.9375C7.9125 13.9375 6.39062 13.1625 5.89062 12.8625C4.31875 11.9156 3.49063 10.975 3.1875 9.7875C3.025 9.14687 3.025 9.11875 3.00938 6.48125L2.99687 4.00625L3.27188 3.96875C4.03437 3.86562 4.81562 3.675 5.51562 3.42188C6.21563 3.16875 7.2625 2.63437 7.82812 2.2375C7.91563 2.17812 7.9875 2.12813 7.99375 2.12813C8 2.125 8.10313 2.19375 8.22813 2.275Z' fill='#6D7075'/>" +
        "<path d='M7.56248 4.01797C6.93435 4.09922 6.28748 4.33672 5.79685 4.66485C5.53748 4.83985 5.45935 4.90547 5.16248 5.1961C4.62498 5.72735 4.24373 6.4336 4.07498 7.21797C3.99373 7.58985 3.99373 8.4086 4.07498 8.78047C4.24998 9.58985 4.59685 10.2273 5.18435 10.8148C5.67498 11.3055 6.12185 11.5836 6.75935 11.7961C8.44998 12.3586 10.325 11.7055 11.3344 10.2023C12.3656 8.66797 12.1719 6.57735 10.8781 5.23672C10.3031 4.64297 9.64685 4.27422 8.84373 4.08985C8.58435 4.03047 7.80935 3.98672 7.56248 4.01797ZM8.50935 5.0461C9.67185 5.24922 10.5906 6.10235 10.9125 7.27735C11.0125 7.6336 11.0094 8.34922 10.9125 8.71797C10.7531 9.30235 10.5344 9.6836 10.1094 10.1086C9.68435 10.5336 9.30623 10.7523 8.71873 10.9117C8.34998 11.0117 7.66873 11.0117 7.28748 10.9117C6.72498 10.7648 6.28435 10.5117 5.87498 10.0961C5.5781 9.7961 5.3656 9.47735 5.22185 9.1211C5.05935 8.71485 5.01873 8.49922 5.01873 7.99922C5.0156 7.5211 5.06873 7.23985 5.22498 6.8586C5.76248 5.56797 7.1406 4.8086 8.50935 5.0461Z' fill='#6D7075'/>" +
        "<path d='M9.31249 6.53057C9.26874 6.54932 8.84374 6.95245 8.36874 7.43057L7.49999 8.29307L7.11874 7.91495C6.70624 7.5087 6.63124 7.46807 6.38436 7.51495C6.23124 7.54307 6.04374 7.73057 6.01561 7.8837C5.96561 8.14932 5.98749 8.18682 6.64999 8.84932C7.17186 9.3712 7.28436 9.46807 7.38124 9.4837C7.66561 9.53682 7.64374 9.55245 8.83436 8.36495C9.61874 7.5837 9.94686 7.23682 9.97186 7.16182C10.0406 6.94932 9.96561 6.72432 9.77499 6.5837C9.67811 6.51182 9.42811 6.4837 9.31249 6.53057Z' fill='#6D7075'/>" +
        "</svg>";
    svguser =
        "<svg width='17' height='16' viewBox='0 0 17 16' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
        "<path fill-rule='evenodd' clip-rule='evenodd' d='M8.5 15C10.3565 15 12.137 14.2625 13.4497 12.9497C14.7625 11.637 15.5 9.85652 15.5 8C15.5 6.14348 14.7625 4.36301 13.4497 3.05025C12.137 1.7375 10.3565 1 8.5 1C6.64348 1 4.86301 1.7375 3.55025 3.05025C2.2375 4.36301 1.5 6.14348 1.5 8C1.5 9.85652 2.2375 11.637 3.55025 12.9497C4.86301 14.2625 6.64348 15 8.5 15ZM5.621 10.879L4.611 11.889C3.84179 11.1198 3.31794 10.1398 3.1057 9.07291C2.89346 8.00601 3.00236 6.90013 3.41864 5.89512C3.83491 4.89012 4.53986 4.03112 5.44434 3.42676C6.34881 2.8224 7.41219 2.49983 8.5 2.49983C9.58781 2.49983 10.6512 2.8224 11.5557 3.42676C12.4601 4.03112 13.1651 4.89012 13.5814 5.89512C13.9976 6.90013 14.1065 8.00601 13.8943 9.07291C13.6821 10.1398 13.1582 11.1198 12.389 11.889L11.379 10.879C11.1004 10.6003 10.7696 10.3792 10.4055 10.2284C10.0414 10.0776 9.6511 9.99995 9.257 10H7.743C7.3489 9.99995 6.95865 10.0776 6.59455 10.2284C6.23045 10.3792 5.89963 10.6003 5.621 10.879Z' fill='#6D7075'/>" +
        "<path d='M8.5 4C7.96957 4 7.46086 4.21071 7.08579 4.58579C6.71071 4.96086 6.5 5.46957 6.5 6V6.5C6.5 7.03043 6.71071 7.53914 7.08579 7.91421C7.46086 8.28929 7.96957 8.5 8.5 8.5C9.03043 8.5 9.53914 8.28929 9.91421 7.91421C10.2893 7.53914 10.5 7.03043 10.5 6.5V6C10.5 5.46957 10.2893 4.96086 9.91421 4.58579C9.53914 4.21071 9.03043 4 8.5 4Z' fill='#6D7075'/>" +
        "</svg>";
    svgproduct =
        "<svg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'>" +
        "<g clip-path='url(#clip0_6350_75911)'>" +
        "<path d='M1.60937 0.678124C1.4375 0.7 1.17812 0.784375 1 0.875C0.584375 1.08437 0.225 1.50625 0.0875 1.94687L0.015625 2.17188V8V13.8281L0.0875 14.0531C0.265625 14.625 0.740625 15.0812 1.3625 15.2719C1.5375 15.325 1.82812 15.3281 8 15.3281C14.1781 15.3281 14.4625 15.325 14.6406 15.2719C15.2469 15.0844 15.6875 14.6719 15.9 14.0906L15.9844 13.8594L15.9937 8.10313C16.0031 1.77812 16.0094 2.10312 15.8156 1.70312C15.6 1.26562 15.2094 0.925 14.7344 0.759375L14.4844 0.671875L8.09375 0.66875C4.57812 0.665625 1.6625 0.671875 1.60937 0.678124ZM14.4844 1.72812C14.6406 1.8 14.8281 1.97812 14.9156 2.14062C14.9687 2.24062 14.9844 2.33437 14.9937 2.63125L15.0062 3H8H0.99375L1.00625 2.63125C1.01875 2.20625 1.0625 2.09375 1.2875 1.88437C1.4125 1.77187 1.5125 1.72188 1.70312 1.67812C1.7375 1.66875 4.6 1.66562 8.0625 1.66875C14.0531 1.67188 14.3656 1.675 14.4844 1.72812ZM14.9937 8.86562L14.9844 13.7344L14.9156 13.8594C14.8281 14.0281 14.6031 14.2312 14.45 14.2844C14.2687 14.35 1.73125 14.35 1.55 14.2844C1.39687 14.2312 1.17187 14.0281 1.08437 13.8594L1.01562 13.7344L1.00625 8.86562L1 4H8H15L14.9937 8.86562Z' fill='#6D7075'/>" +
        "<path d='M2.29692 6.04375C2.1688 6.1 2.03755 6.25938 2.01567 6.38438C2.00317 6.44062 2.00005 6.75312 2.0063 7.08437C2.01567 7.74062 2.02192 7.76562 2.2313 7.91875C2.35317 8.00938 2.64692 8.00938 2.7688 7.91875C2.9563 7.78125 2.98442 7.70937 2.9938 7.34062L3.0063 7H3.92505H4.8438V9.325V11.6469L4.59692 11.6625C4.3063 11.6781 4.17192 11.7437 4.0688 11.925C3.93755 12.1531 4.00942 12.4219 4.25005 12.5844C4.35005 12.6562 4.3688 12.6562 5.3188 12.6562C6.38755 12.6562 6.43442 12.65 6.5688 12.4594C6.67505 12.3125 6.6813 12.0469 6.58755 11.9062C6.4813 11.7469 6.2813 11.6562 6.04067 11.6562H5.8438V9.32812V7H6.74692H7.65005L7.66255 7.32188C7.67505 7.69688 7.73755 7.83437 7.94692 7.94062C8.17817 8.05937 8.42505 7.98438 8.58755 7.75C8.65317 7.65 8.6563 7.61875 8.6563 7C8.6563 6.38125 8.65317 6.35 8.58755 6.25C8.54692 6.19375 8.47505 6.11562 8.42817 6.08125C8.34067 6.01562 8.32817 6.01562 5.36567 6.00938C2.94067 6.00312 2.37192 6.00938 2.29692 6.04375Z' fill='#6D7075'/>" +
        "<path d='M10.2969 6.04384C10.0876 6.13446 9.96881 6.37509 10.0126 6.60946C10.0407 6.75634 10.1969 6.92821 10.3376 6.96884C10.4157 6.99384 10.9907 7.00009 12.0688 6.99384C13.6438 6.98446 13.6844 6.98134 13.7688 6.91884C13.9344 6.79696 13.9844 6.69696 13.9844 6.50009C13.9844 6.30321 13.9344 6.20321 13.7688 6.08134C13.6844 6.01571 13.6438 6.01571 12.0376 6.00946C10.7157 6.00321 10.3719 6.00946 10.2969 6.04384Z' fill='#6D7075'/>" +
        "<path d='M10.3343 8.7C10.1812 8.75625 10.1343 8.8 10.0562 8.95C9.94057 9.17813 10.0156 9.42813 10.2499 9.58438L10.3531 9.65625H11.9999H13.6468L13.7499 9.58438C13.8999 9.48438 13.9749 9.36875 13.9906 9.2125C14.0124 9.03125 13.9187 8.84375 13.7593 8.74688L13.6406 8.67188L12.0468 8.66563C10.7687 8.65938 10.4312 8.66563 10.3343 8.7Z' fill='#6D7075'/>" +
        "<path d='M10.25 11.4125C10.1 11.5156 10.025 11.6312 10.0094 11.7875C9.9875 11.9688 10.0812 12.1562 10.2406 12.2531L10.3594 12.3281H12H13.6406L13.7594 12.2531C13.9187 12.1562 14.0125 11.9688 13.9906 11.7875C13.975 11.6312 13.9 11.5156 13.75 11.4125L13.6469 11.3438H12H10.3531L10.25 11.4125Z' fill='#6D7075'/>" +
        "</g>" +
        "<defs>" +
        "<clipPath id='clip0_6350_75911'>" +
        "<rect width='16' height='16' fill='white'/>" +
        "</clipPath>" +
        "</defs>" +
        "</svg>";

    $(document).on("DOMNodeInserted", function (event) {
        if ($(event.target).hasClass("item-filter")) {
            var dataIconValue = $(event.target).data("icon");
            if (dataIconValue === "status") {
                addIcon(event, svgstatus);
            } else if (dataIconValue === "money") {
                addIcon(event, svgmoney);
            } else if (dataIconValue === "date") {
                addIcon(event, svgdate);
            } else if (dataIconValue === "sl") {
                addIcon(event, svgsl);
            } else if (dataIconValue === "po") {
                addIcon(event, svgpo);
            } else if (dataIconValue === "bh") {
                addIcon(event, svgbh);
            } else if (dataIconValue === "user") {
                addIcon(event, svguser);
            } else if (dataIconValue === "product") {
                addIcon(event, svgproduct);
            }
        }
    });
});

$(document).ready(function () {
    $(".date_end").blur(function () {
        var startValue = $(".date_start").val();
        var endValue = $(this).val();
        if (startValue && endValue) {
            // Kiểm tra cả hai trường đã được nhập đầy đủ
            var startDate = new Date(startValue);
            var endDate = new Date(endValue);
            // Kiểm tra ngày, tháng và năm trước khi thực hiện so sánh
            if (
                endDate.getFullYear() < startDate.getFullYear() ||
                (endDate.getFullYear() === startDate.getFullYear() &&
                    endDate.getMonth() < startDate.getMonth()) ||
                (endDate.getFullYear() === startDate.getFullYear() &&
                    endDate.getMonth() === startDate.getMonth() &&
                    endDate.getDate() < startDate.getDate())
            ) {
                alert(
                    "Ngày kết thúc không được nhỏ hơn hoặc bằng ngày bắt đầu!"
                );
                $(this).val("");
            }
        }
    });
});

// Xử lý click
handleFilterClick($("#btn-email"), $("#email-options"), $(".email-input"));
handleFilterClick($("#btn-debt"), $("#debt-options"), $(".debt-input"));
handleFilterClick($("#btn-name"), $("#name-options"), $(".name-input"));
handleFilterClick($("#btn-tensp"), $("#tensp-options"), $(".tensp-input"));
handleFilterClick($("#btn-hdvao"), $("#hdvao-options"), $(".hdvao-input"));
handleFilterClick($("#btn-hdra"), $("#hdra-options"), $(".hdra-input"));
handleFilterClick($("#btn-users"), $("#users-options"), $(".users-input"));
handleFilterClick($("#btn-status"), $("#status-options"), $(".status-input"));
handleFilterClick($("#btn-pay"), $("#pay-options"), $(".pay-input"));
handleFilterClick($("#btn-total"), $("#total-options"), $(".total-input"));
handleFilterClick($("#btn-POnhap"), $("#POnhap-options"), $(".POnhap-input"));
handleFilterClick($("#btn-BH"), $("#BH-options"), $(".BH-input"));
handleFilterClick($("#btn-VATN"), $("#VATN-options"), $(".VATN-input"));
handleFilterClick($("#btn-slnhap"), $("#slnhap-options"), $(".slnhap-input"));
handleFilterClick($("#btn-POxuat"), $("#POxuat-options"), $(".POxuat-input"));
handleFilterClick($("#btn-TTN"), $("#TTN-options"), $(".TTN-input"));
handleFilterClick($("#btn-TTX"), $("#TTX-options"), $(".TTX-input"));
handleFilterClick($("#btn-HTTTX"), $("#HTTTX-options"), $(".HTTTX-input"));
handleFilterClick($("#btn-HTTTN"), $("#HTTTN-options"), $(".HTTTN-input"));
handleFilterClick($("#btn-date"), $("#date-options"), $(".date-input"));
handleFilterClick($("#btn-idName"), $("#idName-options"), $(".idName-input"));
handleFilterClick(
    $("#btn-dateHDX"),
    $("#dateHDX-options"),
    $(".dateHDX-input")
);
handleFilterClick(
    $("#btn-dateHDN"),
    $("#dateHDN-options"),
    $(".dateHDN-input")
);
handleFilterClick(
    $("#btn-dateTTN"),
    $("#dateTTN-options"),
    $(".dateTTN-input")
);
handleFilterClick(
    $("#btn-dateTTX"),
    $("#dateTTX-options"),
    $(".dateTTX-input")
);
handleFilterClick(
    $("#btn-provide_code"),
    $("#provide_code-options"),
    $(".provide_code-input")
);
handleFilterClick(
    $("#btn-trcVATX"),
    $("#trcVATX-options"),
    $(".trcVATX-input")
);
handleFilterClick($("#btn-VATX"), $("#VATX-options"), $(".VATX-input"));
handleFilterClick(
    $("#btn-sauVATX"),
    $("#sauVATX-options"),
    $(".sauVATX-input")
);
handleFilterClick(
    $("#btn-sauVATN"),
    $("#sauVATN-options"),
    $(".sauVATN-input")
);
handleFilterClick(
    $("#btn-trcVATN"),
    $("#trcVATN-options"),
    $(".trcVATN-input")
);
handleFilterClick(
    $("#btn-payment_code"),
    $("#payment_code-options"),
    $(".payment_code-input")
);
handleFilterClick(
    $("#btn-delivery_code"),
    $("#delivery_code-options"),
    $(".delivery_code-input")
);
handleFilterClick(
    $("#btn-guest_code"),
    $("#guest_code-options"),
    $(".guest_code-input")
);
handleFilterClick(
    $("#btn-code_payment"),
    $("#code_payment-options"),
    $(".code_payment-input")
);
handleFilterClick(
    $("#btn-payment"),
    $("#payment-options"),
    $(".payment-input")
);
handleFilterClick(
    $("#btn-number_bill"),
    $("#number_bill-options"),
    $(".number_bill-input")
);
handleFilterClick(
    $("#btn-shipping_fee"),
    $("#shipping_fee-options"),
    $(".shipping_fee-input")
);
handleFilterClick(
    $("#btn-shipping_unit"),
    $("#shipping_unit-options"),
    $(".shipping_unit-input")
);
handleFilterClick(
    $("#btn-code_delivery"),
    $("#code_delivery-options"),
    $(".code_delivery-input")
);
handleFilterClick(
    $("#btn-reciept"),
    $("#reciept-options"),
    $(".reciept-input")
);
handleFilterClick(
    $("#btn-receive"),
    $("#receive-options"),
    $(".receive-input")
);
handleFilterClick(
    $("#btn-reference_number"),
    $("#reference_number-options"),
    $(".reference_number-input")
);
handleFilterClick(
    $("#btn-quotenumber"),
    $("#quotenumber-options"),
    $(".quotenumber-input")
);
handleFilterClick($("#btn-slxuat"), $("#slxuat-options"), $(".slxuat-input"));
handleFilterClick(
    $("#btn-product_unit"),
    $("#product_unit-options"),
    $(".product_unit-input")
);
handleFilterClick(
    $("#btn-price_export"),
    $("#price_export-options"),
    $(".price_export-input")
);
handleFilterClick(
    $("#btn-total_export"),
    $("#total_export-options"),
    $(".total_export-input")
);
handleFilterClick(
    $("#btn-total_import"),
    $("#total_import-options"),
    $(".total_import-input")
);
// Báo cáo
handleFilterClick(
    $("#btn-date-guest"),
    $("#date-guest-options"),
    $(".date-guest-input")
);
handleFilterClick(
    $("#btn-date-product"),
    $("#date-product-options"),
    $(".date-product-input")
);
handleFilterClick(
    $("#btn-date-thu"),
    $("#date-thu-options"),
    $(".date-thu-input")
);
handleFilterClick(
    $("#btn-date-chi"),
    $("#date-chi-options"),
    $(".date-chi-input")
);
handleFilterClick(
    $("#btn-code-import"),
    $("#code-import-options"),
    $(".code-import-input")
);
handleFilterClick(
    $("#btn-name-import"),
    $("#name-import-options"),
    $(".name-import-input")
);
handleFilterClick(
    $("#btn-total-import"),
    $("#total-import-options"),
    $(".total-import-input")
);
handleFilterClick(
    $("#btn-debt-import"),
    $("#debt-import-options"),
    $(".debt-import-input")
);
//
handleFilterClick(
    $("#btn-code-export"),
    $("#code-export-options"),
    $(".code-export-input")
);
handleFilterClick(
    $("#btn-name-export"),
    $("#name-export-options"),
    $(".name-export-input")
);
handleFilterClick(
    $("#btn-total-export"),
    $("#total-export-options"),
    $(".total-export-input")
);
handleFilterClick(
    $("#btn-debt-export"),
    $("#debt-export-options"),
    $(".debt-export-input")
);
//
handleFilterClick(
    $("#btn-price_import"),
    $("#price_import-options"),
    $(".price_import-input")
);

handleFilterClick(
    $("#btn-product_qty"),
    $("#product_qty-options"),
    $(".product_qty-input")
);
handleFilterClick($("#btn-code"), $("#code-options"), $(".code-input"));
handleFilterClick($("#btn-guests"), $("#guests-options"), $(".guests-input"));
handleFilterClick(
    $("#btn-provides"),
    $("#provides-options"),
    $(".provides-input")
);
handleFilterClick(
    $("#btn-inventory"),
    $("#inventory-options"),
    $(".inventory-input")
);
handleFilterClick($("#btn-phone"), $("#phone-options"), $(".phone-input"));
handleFilterClick(
    $("#btn-company"),
    $("#company-options"),
    $(".company-input")
);

// Xử lí out
handleCancelClick($("#cancel-email"), $(".email-input"), $("#email-options"));
handleCancelClick($("#cancel-debt"), $(".debt-input"), $("#debt-options"));
handleCancelClick($("#cancel-phone"), $(".phone-input"), $("#phone-options"));
handleCancelClick($("#cancel-code"), $(".code-input"), $("#code-options"));
handleCancelClick($("#cancel-hdvao"), $(".hdvao-input"), $("#hdvao-options"));
handleCancelClick($("#cancel-hdra"), $(".hdra-input"), $("#hdra-options"));
handleCancelClick($("#cancel-users"), $(".users-input"), $("#users-options"));
handleCancelClick($("#cancel-pay"), $(".pay-input"), $("#pay-options"));
handleCancelClick($("#cancel-TTN"), $(".TTN-input"), $("#TTN-options"));
handleCancelClick($("#cancel-TTX"), $(".TTX-input"), $("#TTX-options"));
handleCancelClick($("#cancel-HTTTX"), $(".HTTTX-input"), $("#HTTTX-options"));
handleCancelClick($("#cancel-HTTTN"), $(".HTTTN-input"), $("#HTTTN-options"));
handleCancelClick($("#cancel-date"), $(".date-input"), $("#date-options"));
handleCancelClick($("#cancel-total"), $(".total-input"), $("#total-options"));
handleCancelClick(
    $("#cancel-idName"),
    $(".idName-input"),
    $("#idName-options")
);
handleCancelClick(
    $("#cancel-dateTTX"),
    $(".dateTTX-input"),
    $("#dateTTX-options")
);
handleCancelClick(
    $("#cancel-dateTTN"),
    $(".dateTTN-input"),
    $("#dateTTN-options")
);
handleCancelClick(
    $("#cancel-dateHDN"),
    $(".dateHDN-input"),
    $("#dateHDN-options")
);
handleCancelClick(
    $("#cancel-dateHDX"),
    $(".dateHDX-input"),
    $("#dateHDX-options")
);
handleCancelClick(
    $("#cancel-provide_code"),
    $(".provide_code-input"),
    $("#provide_code-options")
);
handleCancelClick(
    $("#cancel-sauVATN"),
    $(".sauVATN-input"),
    $("#sauVATN-options")
);
handleCancelClick(
    $("#cancel-slnhap"),
    $(".slnhap-input"),
    $("#slnhap-options")
);
handleCancelClick(
    $("#cancel-trcVATX"),
    $(".trcVATX-input"),
    $("#trcVATX-options")
);
handleCancelClick($("#cancel-VATX"), $(".VATX-input"), $("#VATX-options"));
handleCancelClick(
    $("#cancel-sauVATX"),
    $(".sauVATX-input"),
    $("#sauVATX-options")
);
handleCancelClick(
    $("#cancel-POnhap"),
    $(".POnhap-input"),
    $("#POnhap-options")
);
handleCancelClick(
    $("#cancel-POxuat"),
    $(".POxuat-input"),
    $("#POxuat-options")
);
handleCancelClick($("#cancel-BH"), $(".BH-input"), $("#BH-options"));
handleCancelClick(
    $("#cancel-trcVATN"),
    $(".trcVATN-input"),
    $("#trcVATN-options")
);
handleCancelClick($("#cancel-VATN"), $(".VATN-input"), $("#VATN-options"));
handleCancelClick(
    $("#cancel-payment_code"),
    $(".payment_code-input"),
    $("#payment_code-options")
);
handleCancelClick(
    $("#cancel-delivery_code"),
    $(".delivery_code-input"),
    $("#delivery_code-options")
);
handleCancelClick(
    $("#cancel-guest_code"),
    $(".guest_code-input"),
    $("#guest_code-options")
);
handleCancelClick(
    $("#cancel-code_payment"),
    $(".code_payment-input"),
    $("#code_payment-options")
);
handleCancelClick(
    $("#cancel-payment"),
    $(".payment-input"),
    $("#payment-options")
);
handleCancelClick(
    $("#cancel-number_bill"),
    $(".number_bill-input"),
    $("#number_bill-options")
);
handleCancelClick(
    $("#cancel-shipping_fee"),
    $(".shipping_fee-input"),
    $("#shipping_fee-options")
);
handleCancelClick(
    $("#cancel-shipping_unit"),
    $(".shipping_unit-input"),
    $("#shipping_unit-options")
);
handleCancelClick(
    $("#cancel-code_delivery"),
    $(".code_delivery-input"),
    $("#code_delivery-options")
);
handleCancelClick(
    $("#cancel-reciept"),
    $(".reciept-input"),
    $("#reciept-options")
);
handleCancelClick(
    $("#cancel-receive"),
    $(".receive-input"),
    $("#receive-options")
);
handleCancelClick(
    $("#cancel-status"),
    $(".status-input"),
    $("#status-options")
);
handleCancelClick(
    $("#cancel-reference_number"),
    $(".reference_number-input"),
    $("#reference_number-options")
);
handleCancelClick(
    $("#cancel-quotenumber"),
    $(".quotenumber-input"),
    $("#quotenumber-options")
);
handleCancelClick(
    $("#cancel-product_unit"),
    $(".product_unit-input"),
    $("#product_unit-options")
);
handleCancelClick(
    $("#cancel-slxuat"),
    $(".slxuat-input"),
    $("#slxuat-options")
);
handleCancelClick(
    $("#cancel-price_export"),
    $(".price_export-input"),
    $("#price_export-options")
);
handleCancelClick(
    $("#cancel-total_export"),
    $(".total_export-input"),
    $("#total_export-options")
);
handleCancelClick(
    $("#cancel-total_import"),
    $(".total_import-input"),
    $("#total_import-options")
);
handleCancelClick(
    $("#cancel-price_import"),
    $(".price_import-input"),
    $("#price_import-options")
);
handleCancelClick(
    $("#cancel-product_qty"),
    $(".product_qty-input"),
    $("#product_qty-options")
);
handleCancelClick(
    $("#cancel-guests"),
    $(".guests-input"),
    $("#guests-options")
);
handleCancelClick(
    $("#cancel-provides"),
    $(".provides-input"),
    $("#provides-options")
);
handleCancelClick($("#cancel-name"), $(".name-input"), $("#name-options"));
handleCancelClick($("#cancel-tensp"), $(".tensp-input"), $("#tensp-options"));
handleCancelClick(
    $("#cancel-inventory"),
    $(".inventory-input"),
    $("#inventory-options")
);
handleCancelClick(
    $("#cancel-company"),
    $(".company-input"),
    $("#company-options")
);
// Báo cáo
handleCancelClick(
    $("#cancel-date-product"),
    $(".date-product-input"),
    $("#date-product-options")
);
handleCancelClick(
    $("#cancel-date-guest"),
    $(".date-guest-input"),
    $("#date-guest-options")
);
handleCancelClick(
    $("#cancel-date-thu"),
    $(".date-thu-input"),
    $("#date-thu-options")
);
handleCancelClick(
    $("#cancel-date-chi"),
    $(".date-chi-input"),
    $("#date-chi-options")
);
handleCancelClick(
    $("#cancel-code-import"),
    $(".code-import-input"),
    $("#code-import-options")
);
handleCancelClick(
    $("#cancel-name-import"),
    $(".name-import-input"),
    $("#name-import-options")
);
handleCancelClick(
    $("#cancel-total-import"),
    $(".total-import-input"),
    $("#total-import-options")
);
handleCancelClick(
    $("#cancel-debt-import"),
    $(".debt-import-input"),
    $("#debt-import-options")
);
//
handleCancelClick(
    $("#cancel-code-export"),
    $(".code-export-input"),
    $("#code-export-options")
);
handleCancelClick(
    $("#cancel-name-export"),
    $(".name-export-input"),
    $("#name-export-options")
);
handleCancelClick(
    $("#cancel-total-export"),
    $(".total-export-input"),
    $("#total-export-options")
);
handleCancelClick(
    $("#cancel-debt-export"),
    $(".debt-export-input"),
    $("#debt-export-options")
);
//

function filterFunction() {
    var input = $("#myInput");
    var filter = input.val().toUpperCase();
    var buttons = $("#dropdown-menu button");

    buttons.each(function () {
        var text = $(this).text();
        if (text.toUpperCase().indexOf(filter) > -1) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

function filterButtons(inputId, containerClass) {
    var input = $("#" + inputId);
    var filter = input.val().toUpperCase();
    var buttons = $("." + containerClass + " li");

    buttons.each(function () {
        var text = $(this).text();
        if (text.toUpperCase().indexOf(filter) > -1) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

function updateFilters(
    data,
    filterClass,
    resultFilterClass,
    tbodyClass,
    elementClass,
    idClass,
    buttonName
) {
    var existingNames = [];

    // Update filters and keep track of existing names
    data.filters.forEach(function (item) {
        if (filters.indexOf(item.name) === -1) {
            filters.push(item.name);
        }
        existingNames.push(item.name);
    });

    filters = filters.filter(function (name) {
        return existingNames.includes(name);
    });

    $(resultFilterClass).empty();

    if (data.filters.length > 0) {
        $(resultFilterClass).addClass("has-filters");
    } else {
        $(resultFilterClass).removeClass("has-filters");
    }

    // Render each filter item
    data.filters.forEach(function (item) {
        var index = filters.indexOf(item.name);
        var itemFilter = $("<div>")
            .addClass(
                "item-filter span input-search d-flex justify-content-center align-items-center mb-2 mr-2"
            )
            .attr({
                "data-icon": item.icon,
                "data-button": item.name,
            });
        itemFilter.css("order", index);
        itemFilter.append(
            '<span class="text text-13-black m-0" style="flex:2;">' +
                item.value +
                '</span><i class="fa-solid fa-xmark btn-submit" data-delete="' +
                item.name +
                '" data-button="' +
                buttonName +
                '"></i>'
        );
        $(resultFilterClass).append(itemFilter);
    });

    // Hide and show relevant elements
    var ids = [];
    data.data.forEach(function (item) {
        ids.push(item.id);
    });

    $(elementClass).each(function () {
        var value = parseInt($(this).find(idClass).val());
        var index = ids.indexOf(value);
        if (index !== -1) {
            $(this).show();
            $(this).attr("data-position", index + 1);
        } else {
            $(this).hide();
        }
    });

    // Sort elements and append to tbody
    var clonedElements = $(elementClass).clone();
    var sortedElements = clonedElements.sort(function (a, b) {
        return $(a).data("position") - $(b).data("position");
    });
    $(tbodyClass).empty().append(sortedElements);
}

// Chỉ dùng cho Báo cáo Thống kê thu chi tồn quỹ
function updateFilters2(
    data,
    filterClass,
    resultFilterClass,
    tbodyClass,
    buttonName
) {
    var existingNames = [];

    // Update filters and keep track of existing names
    data.filters.forEach(function (item) {
        if (filters.indexOf(item.name) === -1) {
            filters.push(item.name);
        }
        existingNames.push(item.name);
    });

    filters = filters.filter(function (name) {
        return existingNames.includes(name);
    });

    $(resultFilterClass).empty();

    if (data.filters.length > 0) {
        $(resultFilterClass).addClass("has-filters");
    } else {
        $(resultFilterClass).removeClass("has-filters");
    }

    // Render each filter item
    data.filters.forEach(function (item) {
        var index = filters.indexOf(item.name);
        var itemFilter = $("<div>")
            .addClass(
                "item-filter span input-search d-flex justify-content-center align-items-center mb-2 mr-2"
            )
            .attr({
                "data-icon": item.icon,
                "data-button": item.name,
            });
        itemFilter.css("order", index);
        itemFilter.append(
            '<span class="text text-13-black m-0" style="flex:2;">' +
                item.value +
                '</span><i class="fa-solid fa-xmark btn-submit" data-delete="' +
                item.name +
                '" data-button="' +
                buttonName +
                '"></i>'
        );
        $(resultFilterClass).append(itemFilter);
    });

    // Process both contentExport and contentImport data
    var allData = [].concat(data.contentExport, data.contentImport);
    var ids = [];
    allData.forEach(function (item) {
        ids.push(item.id);
    });

    var elementClasses = [".thu-info", ".chi-info"];
    var idClasses = [".id-thu", ".id-chi"];

    elementClasses.forEach(function (elementClass, index) {
        var idClass = idClasses[index];

        $(elementClass).each(function () {
            var value = parseInt($(this).find(idClass).val());
            var dataIndex = ids.indexOf(value);
            if (dataIndex !== -1) {
                $(this).show();
                $(this).attr("data-position", dataIndex + 1);
            } else {
                $(this).hide();
            }
        });
    });

    // Sort elements and append to tbody
    var clonedElements = $(elementClasses.join(",")).clone();
    var sortedElements = clonedElements.sort(function (a, b) {
        return $(a).data("position") - $(b).data("position");
    });
    $(tbodyClass).empty().append(sortedElements);
}

// Update report dành cho guest
function updateFiltersReport(
    data,
    filterClass,
    resultFilterClass,
    tbodyClass,
    elementClass,
    idClass,
    buttonName
) {
    var existingNames = [];

    // Update filters and keep track of existing names
    data.filters.forEach(function (item) {
        if (filters.indexOf(item.name) === -1) {
            filters.push(item.name);
        }
        existingNames.push(item.name);
    });

    filters = filters.filter(function (name) {
        return existingNames.includes(name);
    });

    $(resultFilterClass).empty();

    if (data.filters.length > 0) {
        $(resultFilterClass).addClass("has-filters");
    } else {
        $(resultFilterClass).removeClass("has-filters");
    }

    // Render each filter item
    data.filters.forEach(function (item) {
        var index = filters.indexOf(item.name);
        var itemFilter = $("<div>")
            .addClass(
                "item-filter span input-search d-flex justify-content-center align-items-center mb-2 mr-2"
            )
            .attr({
                "data-icon": item.icon,
                "data-button": item.name,
            });
        itemFilter.css("order", index);
        itemFilter.append(
            '<span class="text text-13-black m-0" style="flex:2;">' +
                item.value +
                '</span><i class="fa-solid fa-xmark btn-submit" data-delete="' +
                item.name +
                '" data-button="' +
                buttonName +
                '"></i>'
        );
        $(resultFilterClass).append(itemFilter);
    });

    // Hide and show relevant elements
    var ids = [];
    var groupTotals = {};
    var grandTotals = {
        totalProductVat: 0,
        totalDelivery: 0,
        totalCashReciept: 0,
        totalReturn: 0,
        chiKH: 0,
        totalDebt: 0,
    };

    // Tạo danh sách các id và tính tổng theo group_id từ dữ liệu server
    data.data.forEach(function (item) {
        ids.push(item.id);

        if (!groupTotals[item.group_id]) {
            groupTotals[item.group_id] = {
                totalProductVat: 0,
                totalDelivery: 0,
                totalCashReciept: 0,
                totalReturn: 0,
                chiKH: 0,
                totalDebt: 0,
            };
        }

        // Cập nhật tổng theo group_id
        groupTotals[item.group_id].totalProductVat += parseFloat(
            item.totalProductVat
        );
        groupTotals[item.group_id].totalDelivery += parseFloat(
            item.totalDelivery
        );
        groupTotals[item.group_id].totalCashReciept += parseFloat(
            item.totalCashReciept
        );
        groupTotals[item.group_id].totalReturn += parseFloat(item.totalReturn);
        groupTotals[item.group_id].chiKH += parseFloat(item.chiKH);
        groupTotals[item.group_id].totalDebt += parseFloat(
            item.calculatedValue
        );

        // Cập nhật grand totals
        grandTotals.totalProductVat += parseFloat(item.totalProductVat);
        grandTotals.totalDelivery += parseFloat(item.totalDelivery);
        grandTotals.totalCashReciept += parseFloat(item.totalCashReciept);
        grandTotals.totalReturn += parseFloat(item.totalReturn);
        grandTotals.chiKH += parseFloat(item.chiKH);
        grandTotals.totalDebt += parseFloat(item.calculatedValue);
    });

    $(elementClass).each(function () {
        var value = parseInt($(this).find(idClass).val()); // Lấy giá trị id từ thẻ input
        var index = ids.indexOf(value); // Tìm vị trí của id trong danh sách ids

        if (index !== -1) {
            $(this).show(); // Hiển thị hàng nếu id có trong danh sách
            $(this).attr("data-position", index + 1); // Cập nhật thuộc tính data-position
            var id = $(this).attr("data-id");
            // Tìm đối tượng dữ liệu tương ứng với id
            var correspondingData = data.data.find(
                (item) => item.id === parseInt(id)
            );
            if (correspondingData) {
                // Cập nhật các giá trị vào các phần tử HTML
                $(this)
                    .find(".totalProductVat")
                    .text(formatCurrency(correspondingData.totalProductVat));
                $(this)
                    .find(".totalDelivery")
                    .text(formatCurrency(correspondingData.totalDelivery));
                $(this)
                    .find(".totalCashReciept")
                    .text(formatCurrency(correspondingData.totalCashReciept));
                $(this)
                    .find(".totalReturn")
                    .text(formatCurrency(correspondingData.totalReturn));
                $(this)
                    .find(".chiKH")
                    .text(formatCurrency(correspondingData.chiKH));
                $(this)
                    .find(".totalDebt")
                    .text(formatCurrency(correspondingData.calculatedValue));
            }
        } else {
            $(this).hide(); // Ẩn hàng nếu id không có trong danh sách
        }
    });

    // Hiển thị tổng theo group_id
    $.each(groupTotals, function (groupId, totals) {
        var groupRow = $('tr[data-group="' + groupId + '"]');
        if (groupRow.length) {
            groupRow
                .find(".totalProductVatUngrouped")
                .text(formatCurrency(totals.totalProductVat));
            groupRow
                .find(".totalDeliveryUngrouped")
                .text(formatCurrency(totals.totalDelivery));
            groupRow
                .find(".totalCashRecieptUngrouped")
                .text(formatCurrency(totals.totalCashReciept));
            groupRow
                .find(".totalReturnUngrouped")
                .text(formatCurrency(totals.totalReturn));
            groupRow.find(".chiKHUngrouped").text(formatCurrency(totals.chiKH));
            groupRow
                .find(".totalRemainingUngrouped")
                .text(formatCurrency(totals.totalDebt));
        }
    });

    // Hiển thị grand totals
    $("#grandTotalProductVat").text(
        formatCurrency(grandTotals.totalProductVat)
    );
    $("#grandTotalReturn").text(formatCurrency(grandTotals.totalReturn));
    $("#grandTotalCashReciept").text(
        formatCurrency(grandTotals.totalCashReciept)
    );
    $("#grandTotalChiKH").text(formatCurrency(grandTotals.chiKH));
    $("#grandTotalRemaining").text(formatCurrency(grandTotals.totalDebt));

    // Sort elements and append to tbody
    var clonedElements = $(elementClass).clone();
    var sortedElements = clonedElements.sort(function (a, b) {
        return $(a).data("position") - $(b).data("position");
    });
    $(tbodyClass).empty().append(sortedElements);
}

// Update report dành cho provides
function updateFiltersReport2(
    data,
    filters,
    resultFilterClass,
    tbodyClass,
    elementClass,
    idClass,
    buttonName
) {
    var existingNames = [];

    // Update filters (nếu cần)
    if (data.filters && Array.isArray(data.filters)) {
        data.filters.forEach(function (item) {
            if (filters.indexOf(item.name) === -1) {
                filters.push(item.name);
            }
            existingNames.push(item.name);
        });

        filters = filters.filter(function (name) {
            return existingNames.includes(name);
        });

        $(resultFilterClass).empty();

        if (data.filters.length > 0) {
            $(resultFilterClass).addClass("has-filters");
        } else {
            $(resultFilterClass).removeClass("has-filters");
        }

        // Render each filter item
        data.filters.forEach(function (item) {
            var index = filters.indexOf(item.name);
            var itemFilter = $("<div>")
                .addClass(
                    "item-filter span input-search d-flex justify-content-center align-items-center mb-2 mr-2"
                )
                .attr({
                    "data-icon": item.icon,
                    "data-button": item.name,
                });
            itemFilter.css("order", index);
            itemFilter.append(
                '<span class="text text-13-black m-0" style="flex:2;">' +
                    item.value +
                    '</span><i class="fa-solid fa-xmark btn-submit" data-delete="' +
                    item.name +
                    '" data-button="' +
                    buttonName +
                    '"></i>'
            );
            $(resultFilterClass).append(itemFilter);
        });
    }

    // Xử lý và hiển thị dữ liệu
    var ids = [];
    var groupTotals = {};

    data.data.results.forEach(function (item) {
        ids.push(item.id);

        if (!groupTotals[item.group_id]) {
            groupTotals[item.group_id] = {
                total: 0,
                totalReturn: 0,
                totalCashReciept: 0,
                totalPay: 0,
                totalEnd: 0,
            };
        }

        // Cập nhật tổng theo group_id
        groupTotals[item.group_id].total += parseFloat(item.total);
        groupTotals[item.group_id].totalReturn += parseFloat(item.totalReturn);
        groupTotals[item.group_id].totalCashReciept += parseFloat(
            item.totalCashReciept
        );
        groupTotals[item.group_id].totalPay += parseFloat(item.totalPay);
        groupTotals[item.group_id].totalEnd += parseFloat(item.totalEnd);
    });
    $(elementClass).each(function () {
        var value = parseInt($(this).find(idClass).val());
        var index = ids.indexOf(value);

        if (index !== -1) {
            $(this).show();
            $(this).attr("data-position", index + 1);
            var id = $(this).attr("data-id");
            var correspondingData = data.data.results.find(
                (item) => item.id === parseInt(id)
            );
            if (correspondingData) {
                $(this)
                    .find(".total")
                    .text(formatCurrency(correspondingData.total));
                $(this)
                    .find(".totalReturn")
                    .text(formatCurrency(correspondingData.totalReturn));
                $(this)
                    .find(".totalCashReciept")
                    .text(formatCurrency(correspondingData.totalCashReciept));
                $(this)
                    .find(".totalPay")
                    .text(formatCurrency(correspondingData.totalPay));
                $(this)
                    .find(".totalEnd")
                    .text(formatCurrency(correspondingData.totalEnd));
            }
        } else {
            $(this).hide();
        }
    });

    // Hiển thị tổng theo group_id
    $.each(groupTotals, function (groupId, totals) {
        var groupRow = $('tr[data-group="' + groupId + '"]');
        if (groupRow.length) {
            groupRow.find(".totalUngrouped").text(formatCurrency(totals.total));
            groupRow
                .find(".totalReturnUngrouped")
                .text(formatCurrency(totals.totalReturn));
            groupRow
                .find(".totalCashRecieptUngrouped")
                .text(formatCurrency(totals.totalCashReciept));
            groupRow
                .find(".totalPayUngrouped")
                .text(formatCurrency(totals.totalPay));
            groupRow
                .find(".totalEndUngrouped")
                .text(formatCurrency(totals.totalEnd));
        }
    });

    // Hiển thị grand totals
    $("#grandTotal").text(formatCurrency(data.data.totalBillAll));
    $("#grandTotalReturn").text(formatCurrency(data.data.totalReturnAll));
    $("#grandTotalCashReciept").text(formatCurrency(data.data.totalImportAll));
    $("#grandTotalPay").text(formatCurrency(data.data.totalExportAll));
    $("#grandTotalEnd").text(formatCurrency(data.data.totalEndAll));

    // Sort elements and append to tbody
    var clonedElements = $(elementClass).clone();
    var sortedElements = clonedElements.sort(function (a, b) {
        return $(a).data("position") - $(b).data("position");
    });
    $(tbodyClass).empty().append(sortedElements);
}
