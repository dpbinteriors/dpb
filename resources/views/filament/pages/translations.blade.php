<x-filament-panels::page>
    <style>
        .custom-translation-table {
            display: block;
            height: 700px;
            max-height: 700px;
            overflow-y: scroll;
        }

        .custom-translation-table .editable-empty {
            color: rgb(245, 158, 11);
        }

        .custom-translation-table thead {
            position: sticky;
        }

        .custom-translation-table th {
            position: sticky;
        }

        .custom-translation-table td, th {
            width: 30%;
            padding: 15px;
        }

        .custom-translation-table .clamped-col {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .custom-translation-table .clamped-col:hover {
            -webkit-line-clamp: 99999;
            overflow: visible;
            text-overflow: initial;
        }

        .custom-translation-table .clamped-col:hover {
            text-overflow: initial;
            overflow: visible;
        }

        .custom-translation-table .popover-content {
            padding: 9px 14px;
        }

        .editableform-loading {
            background: url('../img/loading.gif') center center no-repeat;
            height: 25px;
            width: auto;
            min-width: 25px;
        }

        .editableform {
            margin-bottom: 0;
        }

        .editableform .control-group {
            margin-bottom: 0;
            white-space: nowrap;
            line-height: 20px;
        }

        .editable-submit, .editable-cancel {
            width: 45px;
            border-radius: 5px;
            position: relative;
            height: 30px;
            background-color: rgb(245, 158, 11);
        }

        .editable-cancel {
            background-color: #c44e47;
            margin-left: 15px;
        }

        .editable-submit:before, .editable-cancel:before {
            color: white;
            position: absolute;
            border-radius: 5px;
            text-align: center;
            width: 100%;
            left: 50%;
            right: 50%;
            transform: translate(-50%, -50%);
            content: '\2713';
        }

        .editable-cancel:before {
            content: 'x';
        }

        .popover {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1010;
            display: none;
            max-width: 276px;
            padding: 1px;
            text-align: left;
            white-space: normal;
            background-color: #ffffff;
            border: 1px solid #cccccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 6px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            background-clip: padding-box;
        }

        .popover.top {
            margin-top: -10px;
        }

        .popover.right {
            margin-left: 10px;
        }

        .popover.bottom {
            margin-top: 10px;
        }

        .popover.left {
            margin-left: -10px;
        }

        .popover-title {
            padding: 8px 14px;
            margin: 0;
            font-size: 14px;
            font-weight: normal;
            line-height: 18px;
            background-color: #f7f7f7;
            border-bottom: 1px solid #ebebeb;
            border-radius: 5px 5px 0 0;
        }

        .popover-content {
            padding: 9px 14px;
        }

        .popover .arrow,
        .popover .arrow:after {
            position: absolute;
            display: block;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
        }

        .popover .arrow {
            border-width: 11px;
        }

        .popover .arrow:after {
            border-width: 10px;
            content: "";
        }

        .popover.top .arrow {
            bottom: -11px;
            left: 50%;
            margin-left: -11px;
            border-top-color: #999999;
            border-top-color: rgba(0, 0, 0, 0.25);
            border-bottom-width: 0;
        }

        .popover.top .arrow:after {
            bottom: 1px;
            margin-left: -10px;
            border-top-color: #ffffff;
            border-bottom-width: 0;
            content: " ";
        }

        .popover.right .arrow {
            top: 50%;
            left: -11px;
            margin-top: -11px;
            border-right-color: #999999;
            border-right-color: rgba(0, 0, 0, 0.25);
            border-left-width: 0;
        }

        .popover.right .arrow:after {
            bottom: -10px;
            left: 1px;
            border-right-color: #ffffff;
            border-left-width: 0;
            content: " ";
        }

        .popover.bottom .arrow {
            top: -11px;
            left: 50%;
            margin-left: -11px;
            border-bottom-color: #999999;
            border-bottom-color: rgba(0, 0, 0, 0.25);
            border-top-width: 0;
        }

        .popover.bottom .arrow:after {
            top: 1px;
            margin-left: -10px;
            border-bottom-color: #ffffff;
            border-top-width: 0;
            content: " ";
        }

        .popover.left .arrow {
            top: 50%;
            right: -11px;
            margin-top: -11px;
            border-left-color: #999999;
            border-left-color: rgba(0, 0, 0, 0.25);
            border-right-width: 0;
        }

        .popover.left .arrow:after {
            right: 1px;
            bottom: -10px;
            border-left-color: #ffffff;
            border-right-width: 0;
            content: " ";
        }

        .editable-input {
            vertical-align: top;
            display: inline-block;
            width: auto;
            white-space: normal;
            zoom: 1;
            *display: inline;
        }

        .editable-buttons {
            display: block;
            vertical-align: top;
            zoom: 1;
            margin-top: 15px;
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }
    </style>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
    <script
        src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>

    <script>
        $('.btn-publish').click(function () {
            $('#publish-form').submit();
        })
    </script>
    <script>
        (function (e, t) {
            if (e.rails !== t) {
                e.error("jquery-ujs has already been loaded!")
            }
            var n;
            var r = e(document);
            e.rails = n = {
                linkClickSelector: "a[data-confirm], a[data-method], a[data-remote], a[data-disable-with]",
                buttonClickSelector: "button[data-remote], button[data-confirm]",
                inputChangeSelector: "select[data-remote], input[data-remote], textarea[data-remote]",
                formSubmitSelector: "form",
                formInputClickSelector: "form input[type=submit], form input[type=image], form button[type=submit], form button:not([type])",
                disableSelector: "input[data-disable-with], button[data-disable-with], textarea[data-disable-with]",
                enableSelector: "input[data-disable-with]:disabled, button[data-disable-with]:disabled, textarea[data-disable-with]:disabled",
                requiredInputSelector: "input[name][required]:not([disabled]),textarea[name][required]:not([disabled])",
                fileInputSelector: "input[type=file]",
                linkDisableSelector: "a[data-disable-with]",
                buttonDisableSelector: "button[data-remote][data-disable-with]",
                CSRFProtection: function (t) {
                    var n = e('meta[name="csrf-token"]').attr("content");
                    if (n) t.setRequestHeader("X-CSRF-Token", n)
                },
                refreshCSRFTokens: function () {
                    var t = e("meta[name=csrf-token]").attr("content");
                    var n = e("meta[name=csrf-param]").attr("content");
                    e('form input[name="' + n + '"]').val(t)
                },
                fire: function (t, n, r) {
                    var i = e.Event(n);
                    t.trigger(i, r);
                    return i.result !== false
                },
                confirm: function (e) {
                    return confirm(e)
                },
                ajax: function (t) {
                    return e.ajax(t)
                },
                href: function (e) {
                    return e.attr("href")
                },
                handleRemote: function (r) {
                    var i, s, o, u, a, f, l, c;
                    if (n.fire(r, "ajax:before")) {
                        u = r.data("cross-domain");
                        a = u === t ? null : u;
                        f = r.data("with-credentials") || null;
                        l = r.data("type") || e.ajaxSettings && e.ajaxSettings.dataType;
                        if (r.is("form")) {
                            i = r.attr("method");
                            s = r.attr("action");
                            o = r.serializeArray();
                            var h = r.data("ujs:submit-button");
                            if (h) {
                                o.push(h);
                                r.data("ujs:submit-button", null)
                            }
                        } else if (r.is(n.inputChangeSelector)) {
                            i = r.data("method");
                            s = r.data("url");
                            o = r.serialize();
                            if (r.data("params")) o = o + "&" + r.data("params")
                        } else if (r.is(n.buttonClickSelector)) {
                            i = r.data("method") || "get";
                            s = r.data("url");
                            o = r.serialize();
                            if (r.data("params")) o = o + "&" + r.data("params")
                        } else {
                            i = r.data("method");
                            s = n.href(r);
                            o = r.data("params") || null
                        }
                        c = {
                            type: i || "GET", data: o, dataType: l, beforeSend: function (e, i) {
                                if (i.dataType === t) {
                                    e.setRequestHeader("accept", "*/*;q=0.5, " + i.accepts.script)
                                }
                                if (n.fire(r, "ajax:beforeSend", [e, i])) {
                                    r.trigger("ajax:send", e)
                                } else {
                                    return false
                                }
                            }, success: function (e, t, n) {
                                r.trigger("ajax:success", [e, t, n])
                            }, complete: function (e, t) {
                                r.trigger("ajax:complete", [e, t])
                            }, error: function (e, t, n) {
                                r.trigger("ajax:error", [e, t, n])
                            }, crossDomain: a
                        };
                        if (f) {
                            c.xhrFields = {withCredentials: f}
                        }
                        if (s) {
                            c.url = s
                        }
                        return n.ajax(c)
                    } else {
                        return false
                    }
                },
                handleMethod: function (r) {
                    var i = n.href(r), s = r.data("method"), o = r.attr("target"),
                        u = e("meta[name=csrf-token]").attr("content"),
                        a = e("meta[name=csrf-param]").attr("content"),
                        f = e('<form method="post" action="' + i + '"></form>'),
                        l = '<input name="_method" value="' + s + '" type="hidden" />';
                    if (a !== t && u !== t) {
                        l += '<input name="' + a + '" value="' + u + '" type="hidden" />'
                    }
                    if (o) {
                        f.attr("target", o)
                    }
                    f.hide().append(l).appendTo("body");
                    f.submit()
                },
                formElements: function (t, n) {
                    return t.is("form") ? e(t[0].elements).filter(n) : t.find(n)
                },
                disableFormElements: function (t) {
                    n.formElements(t, n.disableSelector).each(function () {
                        n.disableFormElement(e(this))
                    })
                },
                disableFormElement: function (e) {
                    var t = e.is("button") ? "html" : "val";
                    e.data("ujs:enable-with", e[t]());
                    e[t](e.data("disable-with"));
                    e.prop("disabled", true)
                },
                enableFormElements: function (t) {
                    n.formElements(t, n.enableSelector).each(function () {
                        n.enableFormElement(e(this))
                    })
                },
                enableFormElement: function (e) {
                    var t = e.is("button") ? "html" : "val";
                    if (e.data("ujs:enable-with")) e[t](e.data("ujs:enable-with"));
                    e.prop("disabled", false)
                },
                allowAction: function (e) {
                    var t = e.data("confirm"), r = false, i;
                    if (!t) {
                        return true
                    }
                    if (n.fire(e, "confirm")) {
                        r = n.confirm(t);
                        i = n.fire(e, "confirm:complete", [r])
                    }
                    return r && i
                },
                blankInputs: function (t, n, r) {
                    var i = e(), s, o, u = n || "input,textarea", a = t.find(u);
                    a.each(function () {
                        s = e(this);
                        o = s.is("input[type=checkbox],input[type=radio]") ? s.is(":checked") : s.val();
                        if (!o === !r) {
                            if (s.is("input[type=radio]") && a.filter('input[type=radio]:checked[name="' + s.attr("name") + '"]').length) {
                                return true
                            }
                            i = i.add(s)
                        }
                    });
                    return i.length ? i : false
                },
                nonBlankInputs: function (e, t) {
                    return n.blankInputs(e, t, true)
                },
                stopEverything: function (t) {
                    e(t.target).trigger("ujs:everythingStopped");
                    t.stopImmediatePropagation();
                    return false
                },
                disableElement: function (e) {
                    e.data("ujs:enable-with", e.html());
                    e.html(e.data("disable-with"));
                    e.bind("click.railsDisable", function (e) {
                        return n.stopEverything(e)
                    })
                },
                enableElement: function (e) {
                    if (e.data("ujs:enable-with") !== t) {
                        e.html(e.data("ujs:enable-with"));
                        e.removeData("ujs:enable-with")
                    }
                    e.unbind("click.railsDisable")
                }
            };
            if (n.fire(r, "rails:attachBindings")) {
                e.ajaxPrefilter(function (e, t, r) {
                    if (!e.crossDomain) {
                        n.CSRFProtection(r)
                    }
                });
                r.delegate(n.linkDisableSelector, "ajax:complete", function () {
                    n.enableElement(e(this))
                });
                r.delegate(n.buttonDisableSelector, "ajax:complete", function () {
                    n.enableFormElement(e(this))
                });
                r.delegate(n.linkClickSelector, "click.rails", function (r) {
                    var i = e(this), s = i.data("method"), o = i.data("params"), u = r.metaKey || r.ctrlKey;
                    if (!n.allowAction(i)) return n.stopEverything(r);
                    if (!u && i.is(n.linkDisableSelector)) n.disableElement(i);
                    if (i.data("remote") !== t) {
                        if (u && (!s || s === "GET") && !o) {
                            return true
                        }
                        var a = n.handleRemote(i);
                        if (a === false) {
                            n.enableElement(i)
                        } else {
                            a.error(function () {
                                n.enableElement(i)
                            })
                        }
                        return false
                    } else if (i.data("method")) {
                        n.handleMethod(i);
                        return false
                    }
                });
                r.delegate(n.buttonClickSelector, "click.rails", function (t) {
                    var r = e(this);
                    if (!n.allowAction(r)) return n.stopEverything(t);
                    if (r.is(n.buttonDisableSelector)) n.disableFormElement(r);
                    var i = n.handleRemote(r);
                    if (i === false) {
                        n.enableFormElement(r)
                    } else {
                        i.error(function () {
                            n.enableFormElement(r)
                        })
                    }
                    return false
                });
                r.delegate(n.inputChangeSelector, "change.rails", function (t) {
                    var r = e(this);
                    if (!n.allowAction(r)) return n.stopEverything(t);
                    n.handleRemote(r);
                    return false
                });
                r.delegate(n.formSubmitSelector, "submit.rails", function (r) {
                    var i = e(this), s = i.data("remote") !== t, o, u;
                    if (!n.allowAction(i)) return n.stopEverything(r);
                    if (i.attr("novalidate") == t) {
                        o = n.blankInputs(i, n.requiredInputSelector);
                        if (o && n.fire(i, "ajax:aborted:required", [o])) {
                            return n.stopEverything(r)
                        }
                    }
                    if (s) {
                        u = n.nonBlankInputs(i, n.fileInputSelector);
                        if (u) {
                            setTimeout(function () {
                                n.disableFormElements(i)
                            }, 13);
                            var a = n.fire(i, "ajax:aborted:file", [u]);
                            if (!a) {
                                setTimeout(function () {
                                    n.enableFormElements(i)
                                }, 13)
                            }
                            return a
                        }
                        n.handleRemote(i);
                        return false
                    } else {
                        setTimeout(function () {
                            n.disableFormElements(i)
                        }, 13)
                    }
                });
                r.delegate(n.formInputClickSelector, "click.rails", function (t) {
                    var r = e(this);
                    if (!n.allowAction(r)) return n.stopEverything(t);
                    var i = r.attr("name"), s = i ? {name: i, value: r.val()} : null;
                    r.closest("form").data("ujs:submit-button", s)
                });
                r.delegate(n.formSubmitSelector, "ajax:send.rails", function (t) {
                    if (this == t.target) n.disableFormElements(e(this))
                });
                r.delegate(n.formSubmitSelector, "ajax:complete.rails", function (t) {
                    if (this == t.target) n.enableFormElements(e(this))
                });
                e(function () {
                    n.refreshCSRFTokens()
                })
            }
        })(jQuery)
    </script>
    <script>
        jQuery(document).ready(function ($) {

            $.ajaxSetup({
                beforeSend: function (xhr, settings) {
                    console.log('beforesend');
                    settings.data += "&_token=<?php echo csrf_token() ?>";
                }
            });

            $('.editable').editable().on('hidden', function (e, reason) {
                var locale = $(this).data('locale');
                if (reason === 'save') {
                    $(this).removeClass('status-0').addClass('status-1');
                }
                if (reason === 'save' || reason === 'nochange') {
                    var $next = $(this).closest('tr').next().find('.editable.locale-' + locale);
                    setTimeout(function () {
                        $next.editable('show');
                    }, 300);
                }
            });

            $('.group-select').on('change', function () {
                var group = $(this).val();
                if (group) {
                    window.location.href = '<?php echo action('\Barryvdh\TranslationManager\Controller@getView') ?>/' + $(this).val();
                } else {
                    window.location.href = '<?php echo action('\Barryvdh\TranslationManager\Controller@getIndex') ?>';
                }
            });

            $("a.delete-key").on('confirm:complete', function (event, result) {
                if (result) {
                    var row = $(this).closest('tr');
                    var url = $(this).attr('href');
                    var id = row.attr('id');
                    $.post(url, {id: id}, function () {
                        row.remove();
                    });
                }
                return false;
            });

            $('.form-import').on('ajax:success', function (e, data) {
                $('div.success-import strong.counter').text(data.counter);
                $('div.success-import').slideDown();
                window.location.reload();
            });

            $('.form-find').on('ajax:success', function (e, data) {
                $('div.success-find strong.counter').text(data.counter);
                $('div.success-find').slideDown();
                window.location.reload();
            });

            $('.form-publish').on('ajax:success', function (e, data) {
                $('div.success-publish').slideDown();
            });

            $('.form-publish-all').on('ajax:success', function (e, data) {
                $('div.success-publish-all').slideDown();
            });
            $('.enable-auto-translate-group').click(function (event) {
                event.preventDefault();
                $('.autotranslate-block-group').removeClass('hidden');
                $('.enable-auto-translate-group').addClass('hidden');
            })
            $('#base-locale').change(function (event) {
                console.log($(this).val());
                $.cookie('base_locale', $(this).val());
            })
            if (typeof $.cookie('base_locale') !== 'undefined') {
                $('#base-locale').val($.cookie('base_locale'));
            }

        })
    </script>

    <div class="container-fluid">
        @if(Session::has('successPublish'))
            <div class="alert alert-info">
                {{ Session::get('successPublish') }}
            </div>
        @endif

        @if(isset($group))
            <form class="form-inline form-publish text-right" method="POST"
                  style="display: none"
                  id="publish-form"
                  action="{{action('\Barryvdh\TranslationManager\Controller@postPublish', $group)}}"
                  data-remote="true" role="form">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="submit" class="bg-primary-500 text-white rounded py-2 px-4 float-right"
                        data-disable-with="{!! __('panel.publishing') !!}">{!! __('panel.publish-translations') !!}
                </button>
            </form>
        @endif

        <?php if ($group): ?>
        <div>
            <p class="text-right my-4">{!! __('panel.total') !!}: {{ $numTranslations }}, {!! __('panel.changed') !!}:
                <b>{{ $numChanged }}</b></p>
        </div>

        <div
            class="fi-ta-ctn divide-y divide-gray-200 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
            <table
                class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5 custom-translation-table"
                id="translation-table">
                <thead class="bg-gray-50 dark:bg-white/5 text-left">
                <tr>
                    <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-communication-form.title"
                        width="15%">Key
                    </th>
                    @foreach($locales as $locale)
                        <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-communication-form.title"><?= $locale ?></th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($translations as $key => $translation)
                    <tr class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5"
                        id="{{$key}}">
                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-is-read">
                            <div class="fi-ta-col-wrp clamped-col" style="margin-left: 15px">
                                <p>{{$key}}</p>
                            </div>
                        </td>
                        @foreach($locales as $locale)
                            @php($t = isset($translation[$locale]) ? $translation[$locale] : null)
                            <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-is-read">
                                <div class="fi-ta-col-wrp clamped-col">
                                    <a href="#edit"
                                       class=" editable {{ $t ? 'bold' : 0 }} locale-{{ $locale }} "
                                       data-locale="{{ $locale }}"
                                       data-name="{{ $locale . "|" . $key }}"
                                       id="username" data-type="textarea" data-pk="{{ $t ? $t->id : 0 }}"
                                       data-url="{{ $editUrl }}"
                                       data-title="{!! __('panel.enter-translation') !!}">{{ $t ? $t->value : '' }}</a>
                                </div>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</x-filament-panels::page>
