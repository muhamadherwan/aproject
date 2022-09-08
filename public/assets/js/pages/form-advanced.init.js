!function (e) {
    "use strict";

    function t() {
    }

    t.prototype.init = function () {
        e(".select2").select2(), e(".select2-limiting").select2({maximumSelectionLength: 2}), e(".select2-search-disable").select2({minimumResultsForSearch: 1 / 0}), e(".select2-ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories", dataType: "json", delay: 250, data: function (e) {
                    return {q: e.term, page: e.page}
                }, processResults: function (e, t) {
                    return t.page = t.page || 1, {results: e.items, pagination: {more: 30 * t.page < e.total_count}}
                }, cache: !0
            }, placeholder: "Search for a repository", minimumInputLength: 1, templateResult: function (t) {
                if (t.loading) return t.text;
                var a = e("<div class='select2-result-repository clearfix'><div class='select2-result-repository__avatar'><img src='" + t.owner.avatar_url + "' /></div><div class='select2-result-repository__meta'><div class='select2-result-repository__title'></div><div class='select2-result-repository__description'></div><div class='select2-result-repository__statistics'><div class='select2-result-repository__forks'><i class='fa fa-flash'></i> </div><div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> </div><div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> </div></div></div></div>");
                return a.find(".select2-result-repository__title").text(t.full_name), a.find(".select2-result-repository__description").text(t.description), a.find(".select2-result-repository__forks").append(t.forks_count + " Forks"), a.find(".select2-result-repository__stargazers").append(t.stargazers_count + " Stars"), a.find(".select2-result-repository__watchers").append(t.watchers_count + " Watchers"), a
            }, templateSelection: function (e) {
                return e.full_name || e.text
            }
        }), e(".select2-templating").select2({
            templateResult: function (t) {
                return t.id ? e('<span><img src="assets/images/flags/select2/' + t.element.value.toLowerCase() + '.png" class="img-flag" /> ' + t.text + "</span>") : t.text
            }
        }), e("#colorpicker-default").spectrum(), e("#colorpicker-showalpha").spectrum({showAlpha: !0}), e("#colorpicker-showpaletteonly").spectrum({
            showPaletteOnly: !0,
            showPalette: !0,
            color: "#34c38f",
            palette: [["#556ee6", "white", "#34c38f", "rgb(255, 128, 0);", "#50a5f1"], ["red", "yellow", "green", "blue", "violet"]]
        }), e("#colorpicker-togglepaletteonly").spectrum({
            showPaletteOnly: !0,
            togglePaletteOnly: !0,
            togglePaletteMoreText: "more",
            togglePaletteLessText: "less",
            color: "#556ee6",
            palette: [["#000", "#444", "#666", "#999", "#ccc", "#eee", "#f3f3f3", "#fff"], ["#f00", "#f90", "#ff0", "#0f0", "#0ff", "#00f", "#90f", "#f0f"], ["#f4cccc", "#fce5cd", "#fff2cc", "#d9ead3", "#d0e0e3", "#cfe2f3", "#d9d2e9", "#ead1dc"], ["#ea9999", "#f9cb9c", "#ffe599", "#b6d7a8", "#a2c4c9", "#9fc5e8", "#b4a7d6", "#d5a6bd"], ["#e06666", "#f6b26b", "#ffd966", "#93c47d", "#76a5af", "#6fa8dc", "#8e7cc3", "#c27ba0"], ["#c00", "#e69138", "#f1c232", "#6aa84f", "#45818e", "#3d85c6", "#674ea7", "#a64d79"], ["#900", "#b45f06", "#bf9000", "#38761d", "#134f5c", "#0b5394", "#351c75", "#741b47"], ["#600", "#783f04", "#7f6000", "#274e13", "#0c343d", "#073763", "#20124d", "#4c1130"]]
        }), e("#colorpicker-showintial").spectrum({showInitial: !0}), e("#colorpicker-showinput-intial").spectrum({
            showInitial: !0,
            showInput: !0
        }), e("#timepicker").timepicker({
            icons: {up: "mdi mdi-chevron-up", down: "mdi mdi-chevron-down"},
            appendWidgetTo: "#timepicker-input-group1"
        }), e("#timepicker2").timepicker({
            showMeridian: !1,
            icons: {up: "mdi mdi-chevron-up", down: "mdi mdi-chevron-down"},
            appendWidgetTo: "#timepicker-input-group2"
        }), e("#timepicker3").timepicker({
            minuteStep: 15,
            icons: {up: "mdi mdi-chevron-up", down: "mdi mdi-chevron-down"},
            appendWidgetTo: "#timepicker-input-group3"
        });
        var t = {};
        e('[data-toggle="touchspin"]').each((function (a, i) {
            var s = e.extend({}, t, e(i).data());
            e(i).TouchSpin(s)
        })), e("input[name='demo3_21']").TouchSpin({
            initval: 40,
            buttondown_class: "btn btn-primary",
            buttonup_class: "btn btn-primary"
        }), e("input[name='demo3_22']").TouchSpin({
            initval: 40,
            buttondown_class: "btn btn-primary",
            buttonup_class: "btn btn-primary"
        }), e("input[name='demo_vertical']").TouchSpin({verticalbuttons: !0}), e("input#defaultconfig").maxlength({
            warningClass: "badge bg-info",
            limitReachedClass: "badge bg-warning"
        }), e("input#thresholdconfig").maxlength({
            threshold: 20,
            warningClass: "badge bg-info",
            limitReachedClass: "badge bg-warning"
        }), e("input#moreoptions").maxlength({
            alwaysShow: !0,
            warningClass: "badge bg-success",
            limitReachedClass: "badge bg-danger"
        }), e("input#alloptions").maxlength({
            alwaysShow: !0,
            warningClass: "badge bg-success",
            limitReachedClass: "badge bg-danger",
            separator: " out of ",
            preText: "You typed ",
            postText: " chars available.",
            validate: !0
        }), e("textarea#textarea").maxlength({
            alwaysShow: !0,
            warningClass: "badge bg-info",
            limitReachedClass: "badge bg-warning"
        }), e("input#placement").maxlength({
            alwaysShow: !0,
            placement: "top-left",
            warningClass: "badge bg-info",
            limitReachedClass: "badge bg-warning"
        })
    }, e.AdvancedForm = new t, e.AdvancedForm.Constructor = t
}(window.jQuery), function () {
    "use strict";
    window.jQuery.AdvancedForm.init()
}(), $((function () {
    "use strict";
    var e = $(".docs-date"), t = $(".docs-datepicker-container"), a = $(".docs-datepicker-trigger"), i = {
        show: function (e) {
            console.log(e.type, e.namespace)
        }, hide: function (e) {
            console.log(e.type, e.namespace)
        }, pick: function (e) {
            console.log(e.type, e.namespace, e.view)
        }
    };
    e.on({
        "show.datepicker": function (e) {
            console.log(e.type, e.namespace)
        }, "hide.datepicker": function (e) {
            console.log(e.type, e.namespace)
        }, "pick.datepicker": function (e) {
            console.log(e.type, e.namespace, e.view)
        }
    }).datepicker(i), $(".docs-options, .docs-toggles").on("change", (function (s) {
        var c, o = s.target, n = $(o), r = (s = n.attr("name"), "checkbox" === o.type ? o.checked : n.val());
        switch (s) {
            case"container":
                r ? (r = t).show() : t.hide();
                break;
            case"trigger":
                r ? (r = a).prop("disabled", !1) : a.prop("disabled", !0);
                break;
            case"inline":
                (c = $('input[name="container"]')).prop("checked") || c.click();
                break;
            case"language":
                $('input[name="format"]').val($.fn.datepicker.languages[r].format)
        }
        i[s] = r, e.datepicker("reset").datepicker("destroy").datepicker(i)
    })), $(".docs-actions").on("click", "button", (function (t) {
        var a = $(this).data(), i = a.arguments || [];
        t.stopPropagation(), a.method && (a.source ? e.datepicker(a.method, $(a.source).val()) : (i = e.datepicker(a.method, i[0], i[1], i[2])) && a.target && $(a.target).val(i))
    }))
}));
