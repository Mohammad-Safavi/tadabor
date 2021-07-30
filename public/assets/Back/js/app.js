$("#upload").on("submit", function (event) {
    event.preventDefault();
    $.ajax({
        xhr: function () {
            var xhr = new window.XMLHttpRequest();

            xhr.upload.addEventListener(
                "progress",
                function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100) + "%";
                        $("#prog").css("display", "block");
                        $("#percent").text(percentComplete);
                        $("#bar").width(percentComplete);
                        $("#submit").prop("disabled", true);

                        if (percentComplete === 100) {
                            $("#status").html("آپلود با موفقیت انجام شد.");
                            $("#submit").prop("disabled", false);
                            $("#prog").css("display", "none");
                        }
                    }
                },
                false
            );

            return xhr;
        },
        url: "/sin-panel/file-course/store",
        method: "POST",
        data: new FormData(this),
        datatype: "json",
        contentType: false,
        cache: false,
        processData: false,
        enctype: "multipart/form-data",
        success: function (response) {
            if (response.success) {
                location.reload();
                Snackbar.show({
                    text: response.message,
                    actionTextColor: "#fff",
                    backgroundColor: "#8dbf42",
                    pos: "bottom-left",
                    showAction: false,
                });
                location.reload();
            } else {
                alert("Error");
                $("#submit").prop("disabled", false);
                $("#prog").css("display", "none");
            }
        },
        error: function (response) {
            $("#submit").prop("disabled", false);
            $("#prog").css("display", "none");
            Snackbar.show({
                text: response.message,
                actionTextColor: "#fff",
                backgroundColor: "#e7515a",
                pos: "bottom-left",
                showAction: false,
            });
        },
    });
});
$("#filemodal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var modal = $(this);
    modal.find("#course_id").val(id);
});
$("#onefilemodal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var modal = $(this);
    modal.find("#course_id").val(id);
});
$("#mynavbar").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var title = button.data("title");
    var url = button.data("url");
    var open = button.data("open");
    var modal = $(this);
    modal.find("#nav_id").val(id);
    modal.find("#title").val(title);
    modal.find("#url").val(url);
    modal.find("#open_form").val(open);
});
$("#myitem").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var title = button.data("title");
    var url = button.data("url");
    var open = button.data("open");
    var modal = $(this);
    modal.find("#item_id").val(id);
    modal.find("#title").val(title);
    modal.find("#url").val(url);
    modal.find("#open_form").val(open);
});
$("#mymessage").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var name = button.data("name");
    var last_name = button.data("last_name");
    var phone = button.data("phone");
    var text = button.data("text");
    var modal = $(this);
    modal.find("#name").text(name);
    modal.find("#last_name").text(last_name);
    modal.find("#phone").text(phone);
    modal.find("#text").text(text);
});
$("#mycomment").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var comment = button.data("comment");
    var modal = $(this);
    modal.find("#comment").text(comment);
});
function select_type() {
    var type = document.getElementById("type").value;
    var time_label = document.getElementById("time_label");
    var time = document.getElementById("time");
    switch (type) {
        case "1":
            time.type = "hidden";
            time_label.style.display = "none";
            break;
        case "2":
            time.type = "text";
            time_label.style.display = "block";
            break;
        case "3":
            time.type = "text";
            time_label.style.display = "block";
            break;
        case "4":
            time.type = "hidden";
            time_label.style.display = "none";
            break;
    }
}
var App = (function () {
    var MediaSize = { xl: 1200, lg: 992, md: 991, sm: 576 };
    var ToggleClasses = {
        headerhamburger: ".toggle-sidebar",
        inputFocused: "input-focused",
    };
    var Selector = {
        mainHeader: ".header.navbar",
        headerhamburger: ".toggle-sidebar",
        fixed: ".fixed-top",
        mainContainer: ".main-container",
        sidebar: "#sidebar",
        sidebarContent: "#sidebar-content",
        sidebarStickyContent: ".sticky-sidebar-content",
        ariaExpandedTrue: '#sidebar [aria-expanded="true"]',
        ariaExpandedFalse: '#sidebar [aria-expanded="false"]',
        contentWrapper: "#content",
        contentWrapperContent: ".container",
        mainContentArea: ".main-content",
        searchFull: ".toggle-search",
        overlay: {
            sidebar: ".overlay",
            cs: ".cs-overlay",
            search: ".search-overlay",
        },
    };
    var categoryScroll = {
        scrollCat: function () {
            var sidebarWrapper = document.querySelectorAll(
                '.sidebar-wrapper [aria-expanded="true"]'
            )[0];
            var sidebarWrapperTop = sidebarWrapper.offsetTop - 20;
            setTimeout(function () {
                $(".menu-categories").animate(
                    { scrollTop: sidebarWrapperTop },
                    500
                );
            }, 500);
        },
    };
    var toggleFunction = {
        sidebar: function ($recentSubmenu) {
            $(".sidebarCollapse").on("click", function (sidebar) {
                sidebar.preventDefault();
                getSidebar = $(".sidebar-wrapper");
                console.log("drill 1");
                if ($recentSubmenu === true) {
                    console.log("drill 2");
                    if ($(".collapse.submenu").hasClass("show")) {
                        console.log("drill 3");
                        $(".submenu.show").addClass("mini-recent-submenu");
                        getSidebar
                            .find(".collapse.submenu")
                            .removeClass("show");
                        getSidebar
                            .find(".collapse.submenu")
                            .removeClass("show");
                        $(".collapse.submenu")
                            .parents("li.menu")
                            .find(".dropdown-toggle")
                            .attr("aria-expanded", "false");
                    } else {
                        console.log("drill 4");
                        if (
                            $(Selector.mainContainer).hasClass("sidebar-closed")
                        ) {
                            console.log("drill 5");
                            if (
                                $(".collapse.submenu").hasClass(
                                    "recent-submenu"
                                )
                            ) {
                                getSidebar
                                    .find(".collapse.submenu.recent-submenu")
                                    .addClass("show");
                                $(".collapse.submenu.recent-submenu")
                                    .parents(".menu")
                                    .find(".dropdown-toggle")
                                    .attr("aria-expanded", "true");
                                $(".submenu").removeClass(
                                    "mini-recent-submenu"
                                );
                                console.log("drill 6");
                            } else {
                                $("li.active .submenu").addClass(
                                    "recent-submenu"
                                );
                                getSidebar
                                    .find(".collapse.submenu.recent-submenu")
                                    .addClass("show");
                                $(".collapse.submenu.recent-submenu")
                                    .parents(".menu")
                                    .find(".dropdown-toggle")
                                    .attr("aria-expanded", "true");
                                $(".submenu").removeClass(
                                    "mini-recent-submenu"
                                );
                                console.log("drill 7");
                            }
                        }
                    }
                    console.log("drill 2 end");
                }
                console.log("end drill");
                $(Selector.mainContainer).toggleClass("sidebar-closed");
                $(Selector.mainHeader).toggleClass("expand-header");
                $(Selector.mainContainer).toggleClass("sbar-open");
                $(".overlay").toggleClass("show");
                $("html,body").toggleClass("sidebar-noneoverflow");
            });
        },
        onToggleSidebarSubmenu: function () {
            $(".sidebar-wrapper").on("mouseenter mouseleave", function (event) {
                event.preventDefault();
                if ($("body").hasClass("alt-menu")) {
                    if ($(".main-container").hasClass("sidebar-closed")) {
                        if (event.type === "mouseenter") {
                            $("li .submenu").removeClass("show");
                            $("li.active .submenu").addClass("recent-submenu");
                            $("li.active")
                                .find(".collapse.submenu.recent-submenu")
                                .addClass("show");
                            $(".collapse.submenu.recent-submenu")
                                .parents(".menu")
                                .find(".dropdown-toggle")
                                .attr("aria-expanded", "true");
                        } else if (event.type === "mouseleave") {
                            $("li")
                                .find(".collapse.submenu")
                                .removeClass("show");
                            $(".collapse.submenu.recent-submenu")
                                .parents(".menu")
                                .find(".dropdown-toggle")
                                .attr("aria-expanded", "false");
                            $(".collapse.submenu")
                                .parents(".menu")
                                .find(".dropdown-toggle")
                                .attr("aria-expanded", "false");
                        }
                    }
                } else {
                    if ($(".main-container").hasClass("sidebar-closed")) {
                        if (event.type === "mouseenter") {
                            $(this)
                                .find(".submenu.recent-submenu")
                                .addClass("show");
                            $(".collapse.submenu.recent-submenu")
                                .parents(".menu")
                                .find(".dropdown-toggle")
                                .attr("aria-expanded", "true");
                        } else if (event.type === "mouseleave") {
                            $(this)
                                .find(".submenu.recent-submenu")
                                .removeClass("show");
                            $(".collapse.submenu.recent-submenu")
                                .parents(".menu")
                                .find(".dropdown-toggle")
                                .attr("aria-expanded", "false");
                        }
                    }
                }
            });
        },
        offToggleSidebarSubmenu: function () {
            $(".sidebar-wrapper").off("mouseenter mouseleave");
        },
        overlay: function () {
            $("#dismiss, .overlay, cs-overlay").on("click", function () {
                $(Selector.mainContainer).addClass("sidebar-closed");
                $(Selector.mainContainer).removeClass("sbar-open");
                $(".overlay").removeClass("show");
                $("html,body").removeClass("sidebar-noneoverflow");
            });
        },
        search: function () {
            $(Selector.searchFull).click(function (event) {
                $(this)
                    .parents(".search-animated")
                    .find(".search-full")
                    .addClass(ToggleClasses.inputFocused);
                $(this).parents(".search-animated").addClass("show-search");
                $(Selector.overlay.search).addClass("show");
                $(Selector.overlay.search).addClass("show");
            });
            $(Selector.overlay.search).click(function (event) {
                $(this).removeClass("show");
                $(Selector.searchFull)
                    .parents(".search-animated")
                    .find(".search-full")
                    .removeClass(ToggleClasses.inputFocused);
                $(Selector.searchFull)
                    .parents(".search-animated")
                    .removeClass("show-search");
            });
        },
    };
    var inBuiltfunctionality = {
        mainCatActivateScroll: function () {
            const ps = new PerfectScrollbar(".menu-categories", {
                wheelSpeed: 0.5,
                swipeEasing: !0,
                minScrollbarLength: 40,
                maxScrollbarLength: 300,
            });
        },
        preventScrollBody: function () {
            $("#sidebar").bind("mousewheel DOMMouseScroll", function (e) {
                var scrollTo = null;
                if (e.type == "mousewheel") {
                    scrollTo = e.originalEvent.wheelDelta * -1;
                } else if (e.type == "DOMMouseScroll") {
                    scrollTo = 40 * e.originalEvent.detail;
                }
                if (scrollTo) {
                    e.preventDefault();
                    $(this).scrollTop(scrollTo + $(this).scrollTop());
                }
            });
        },
        languageDropdown: function () {
            var getDropdownElement = document.querySelectorAll(
                ".more-dropdown.language-dropdown .dropdown-item"
            );
            for (var i = 0; i < getDropdownElement.length; i++) {
                getDropdownElement[i].addEventListener("click", function () {
                    document.querySelectorAll(
                        ".more-dropdown.language-dropdown .dropdown-toggle > span"
                    )[0].innerText = this.getAttribute("data-value");
                    document
                        .querySelectorAll(
                            ".more-dropdown .dropdown-toggle > img"
                        )[0]
                        .setAttribute(
                            "src",
                            "assets/img/" +
                                this.getAttribute("data-img-value") +
                                ".png"
                        );
                });
            }
        },
        appsDropdown: function () {
            var getDropdownElement = document.querySelectorAll(
                ".more-dropdown.apps-dropdown .dropdown-item"
            );
            for (var i = 0; i < getDropdownElement.length; i++) {
                getDropdownElement[i].addEventListener("click", function () {
                    document.querySelectorAll(
                        ".more-dropdown.apps-dropdown .dropdown-toggle > span"
                    )[0].innerText = this.getAttribute("data-value");
                });
            }
        },
    };
    var _mobileResolution = {
        onRefresh: function () {
            var windowWidth = window.innerWidth;
            if (windowWidth <= MediaSize.md) {
                categoryScroll.scrollCat();
                toggleFunction.sidebar();
            }
        },
        onResize: function () {
            $(window).on("resize", function (event) {
                event.preventDefault();
                var windowWidth = window.innerWidth;
                if (windowWidth <= MediaSize.md) {
                    toggleFunction.offToggleSidebarSubmenu();
                }
            });
        },
    };
    var _desktopResolution = {
        onRefresh: function () {
            var windowWidth = window.innerWidth;
            if (windowWidth > MediaSize.md) {
                categoryScroll.scrollCat();
                toggleFunction.sidebar(true);
                toggleFunction.onToggleSidebarSubmenu();
            }
        },
        onResize: function () {
            $(window).on("resize", function (event) {
                event.preventDefault();
                var windowWidth = window.innerWidth;
                if (windowWidth > MediaSize.md) {
                    toggleFunction.onToggleSidebarSubmenu();
                }
            });
        },
    };

    function sidebarFunctionality() {
        function sidebarCloser() {
            if (window.innerWidth <= 991) {
                if (!$("body").hasClass("alt-menu")) {
                    $("#container").addClass("sidebar-closed");
                    $(".overlay").removeClass("show");
                } else {
                    $(".navbar").removeClass("expand-header");
                    $(".overlay").removeClass("show");
                    $("#container").removeClass("sbar-open");
                    $("html, body").removeClass("sidebar-noneoverflow");
                }
            } else if (window.innerWidth > 991) {
                if (!$("body").hasClass("alt-menu")) {
                    $("#container").removeClass("sidebar-closed");
                    $(".navbar").removeClass("expand-header");
                    $(".overlay").removeClass("show");
                    $("#container").removeClass("sbar-open");
                    $("html, body").removeClass("sidebar-noneoverflow");
                } else {
                    $("html, body").addClass("sidebar-noneoverflow");
                    $("#container").addClass("sidebar-closed");
                    $(".navbar").addClass("expand-header");
                    $(".overlay").addClass("show");
                    $("#container").addClass("sbar-open");
                    $('.sidebar-wrapper [aria-expanded="true"]')
                        .parents("li.menu")
                        .find(".collapse")
                        .removeClass("show");
                }
            }
        }

        function sidebarMobCheck() {
            if (window.innerWidth <= 991) {
                if ($(".main-container").hasClass("sbar-open")) {
                    return;
                } else {
                    sidebarCloser();
                }
            } else if (window.innerWidth > 991) {
                sidebarCloser();
            }
        }

        sidebarCloser();
        $(window).resize(function (event) {
            sidebarMobCheck();
        });
    }

    return {
        init: function () {
            toggleFunction.overlay();
            toggleFunction.search();
            _desktopResolution.onRefresh();
            _desktopResolution.onResize();
            _mobileResolution.onRefresh();
            _mobileResolution.onResize();
            sidebarFunctionality();
            inBuiltfunctionality.mainCatActivateScroll();
            inBuiltfunctionality.preventScrollBody();
            inBuiltfunctionality.languageDropdown();
            inBuiltfunctionality.appsDropdown();
        },
    };
})();
