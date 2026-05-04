<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Specter Training | Authority in Education</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;700;800;900&amp;family=Inter:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary-container": "#00201d",
                        "on-primary-fixed": "#131b2e",
                        "inverse-on-surface": "#eff1f3",
                        "tertiary-fixed": "#89f5e7",
                        "surface-tint": "#565e74",
                        "secondary": "#505f76",
                        "inverse-primary": "#bec6e0",
                        "error": "#ba1a1a",
                        "surface-container": "#eceef0",
                        "primary-fixed-dim": "#bec6e0",
                        "on-secondary-container": "#54647a",
                        "on-tertiary-container": "#0c9488",
                        "on-tertiary-fixed-variant": "#005049",
                        "tertiary": "#000000",
                        "on-primary-container": "#7c839b",
                        "primary-fixed": "#dae2fd",
                        "outline-variant": "#c6c6cd",
                        "on-tertiary": "#ffffff",
                        "on-primary": "#ffffff",
                        "inverse-surface": "#2d3133",
                        "on-surface": "#191c1e",
                        "secondary-container": "#d0e1fb",
                        "surface-bright": "#f7f9fb",
                        "primary": "#000000",
                        "on-secondary-fixed": "#0b1c30",
                        "on-surface-variant": "#45464d",
                        "error-container": "#ffdad6",
                        "on-tertiary-fixed": "#00201d",
                        "surface-variant": "#e0e3e5",
                        "on-primary-fixed-variant": "#3f465c",
                        "primary-container": "#131b2e",
                        "on-secondary": "#ffffff",
                        "surface-container-low": "#f2f4f6",
                        "on-error": "#ffffff",
                        "on-error-container": "#93000a",
                        "on-secondary-fixed-variant": "#38485d",
                        "secondary-fixed-dim": "#b7c8e1",
                        "surface-container-high": "#e6e8ea",
                        "outline": "#76777d",
                        "tertiary-fixed-dim": "#6bd8cb",
                        "surface-dim": "#d8dadc",
                        "surface-container-lowest": "#ffffff",
                        "background": "#f7f9fb",
                        "surface-container-highest": "#e0e3e5",
                        "surface": "#f7f9fb",
                        "secondary-fixed": "#d3e4fe",
                        "on-background": "#191c1e"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "base": "8px",
                        "stack-md": "16px",
                        "gutter": "24px",
                        "margin-mobile": "16px",
                        "stack-lg": "24px",
                        "stack-sm": "8px",
                        "section-gap": "80px",
                        "container-max": "1280px"
                    },
                    "fontFamily": {
                        "display-xl": ["Public Sans"],
                        "headline-lg": ["Public Sans"],
                        "label-bold": ["Inter"],
                        "body-lg": ["Inter"],
                        "caption": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-md": ["Public Sans"]
                    },
                    "fontSize": {
                        "display-xl": ["48px", {
                            "lineHeight": "1.1",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "1.2",
                            "fontWeight": "600"
                        }],
                        "label-bold": ["14px", {
                            "lineHeight": "1.2",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "caption": ["12px", {
                            "lineHeight": "1.4",
                            "fontWeight": "400"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "1.5",
                            "fontWeight": "400"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "1.3",
                            "fontWeight": "600"
                        }]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #f7f9fb 0%, #dae2fd 100%);
        }

        .qualification-card:hover {
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.1);
            transform: translateY(-4px);
        }
    </style>
    <style data-stitch-injected="">
        /* For Webkit Browsers (Chrome, Safari, Edge) */
        body::-webkit-scrollbar {
            display: none;
        }

        /* For Firefox */
        html {
            scrollbar-width: none;
        }

        /* For IE/Edge */
        body {
            -ms-overflow-style: none;
            min-height: auto !important;
        }
    </style>
    <style data-stitch-injected="">
        /* ─── Animation styles ─── */
        .stitch-anim-highlight {
            outline: 2px solid rgba(59, 130, 246, 0.5);
            outline-offset: 2px;
            border-radius: 4px;
            transition: outline-color 0.4s ease;
        }

        .stitch-anim-highlight-fade {
            outline-color: transparent;
        }

        @keyframes stitch-anim-fade-in {
            from {
                opacity: 0;
                transform: translateY(6px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stitch-anim-fade-in {
            animation: stitch-anim-fade-in 0.3s ease forwards;
        }

        /* ─── Drawing rectangle overlay ─── */
        .stitch-anim-draw-overlay {
            position: fixed;
            border: 2px solid rgba(59, 130, 246, 0.6);
            border-radius: 6px;
            pointer-events: none;
            z-index: 998;
            clip-path: polygon(0% 0%, 0% 0%,
                    0% 0%, 0% 0%,
                    0% 0%, 0% 0%);
            animation: stitch-anim-draw-rect 0.4s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        @keyframes stitch-anim-draw-rect {
            0% {
                clip-path: polygon(0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%);
            }

            30% {
                clip-path: polygon(0% 0%, 100% 0%, 100% 0%, 100% 0%, 0% 0%, 0% 0%);
            }

            55% {
                clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 100% 100%, 0% 0%, 0% 0%);
            }

            80% {
                clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%, 0% 100%, 0% 0%);
            }

            100% {
                clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%, 0% 0%, 0% 0%);
            }
        }

        .stitch-anim-draw-overlay.fading {
            animation: stitch-anim-border-fade 0.5s ease forwards;
        }

        @keyframes stitch-anim-border-fade {
            to {
                opacity: 0;
            }
        }

        /* ─── Image reveal crossfade ─── */
        .stitch-anim-img-dimming {
            transition: opacity 0.2s ease !important;
            opacity: 0.15 !important;
        }

        .stitch-anim-img-revealing {
            transition: opacity 0.35s ease !important;
            opacity: 1 !important;
        }

        .stitch-anim-cursor::after {
            content: '|';
            font-weight: 100;
            animation: stitch-anim-blink 0.6s step-end infinite;
            color: rgba(59, 130, 246, 0.7);
            margin-left: 1px;
        }

        @keyframes stitch-anim-blink {
            50% {
                opacity: 0;
            }
        }

        /* ─── AI Agent Cursor ─── */
        #stitch-agent-cursor {
            position: fixed;
            z-index: 9999;
            pointer-events: none;
            transition: left 0.2s cubic-bezier(0.22, 1, 0.36, 1),
                top 0.2s cubic-bezier(0.22, 1, 0.36, 1),
                opacity 0.25s ease;
            opacity: 0;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.18));
        }

        #stitch-agent-cursor.working {
            animation: stitch-anim-wobble 0.8s ease-in-out infinite;
        }

        #stitch-agent-cursor.drawing {
            animation: none;
            transition: left 0.12s linear, top 0.12s linear, opacity 0.25s ease;
        }

        @keyframes stitch-anim-wobble {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            25% {
                transform: translate(1px, -1px) rotate(2deg);
            }

            50% {
                transform: translate(-1px, 1px) rotate(-1deg);
            }

            75% {
                transform: translate(1px, 0px) rotate(1deg);
            }
        }

        #stitch-agent-cursor .cursor-pointer {
            display: block;
        }

        #stitch-agent-cursor .cursor-text,
        #stitch-agent-cursor .cursor-paint {
            display: none;
        }

        #stitch-agent-cursor.text-mode .cursor-pointer,
        #stitch-agent-cursor.text-mode .cursor-paint {
            display: none;
        }

        #stitch-agent-cursor.text-mode .cursor-text {
            display: block;
        }

        #stitch-agent-cursor.paint-mode .cursor-pointer,
        #stitch-agent-cursor.paint-mode .cursor-text {
            display: none;
        }

        #stitch-agent-cursor.paint-mode .cursor-paint {
            display: block;
        }

        #stitch-cursor-label {
            position: absolute;
            top: 22px;
            left: 16px;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            color: white;
            font-size: 10px;
            font-family: Inter, sans-serif;
            font-weight: 600;
            padding: 2px 8px;
            border-radius: 4px;
            white-space: nowrap;
            letter-spacing: 0.02em;
        }
    </style>
    <script data-stitch-injected="">
        (function Fe() {
            window.addEventListener(`message`, async function(e) {
                let t = e.data;
                if (!t || t.type !== `capture_screenshot` || e.source !== window.parent) return;
                let n = t.requestId,
                    r = t.captureEngineSource,
                    i = t.options || {},
                    a = window.innerWidth,
                    o = window.innerHeight,
                    s = window.scrollX,
                    c = window.scrollY,
                    l = document.documentElement,
                    u = l.style.width,
                    d = l.style.height,
                    f = l.style.overflow,
                    p = l.style.position;
                try {
                    if (!window.snapdom && r) {
                        let e = document.createElement(`script`);
                        e.setAttribute(`data-stitch-injected`, ``), e.textContent = r, document.head
                            .appendChild(e)
                    }
                    let e = window.snapdom;
                    if (!e) {
                        window.parent.postMessage({
                            type: `screenshot_error`,
                            requestId: n,
                            errorCode: `CAPTURE_ENGINE_UNAVAILABLE`,
                            error: `Capture engine not available. Ensure source is sent with the capture request.`
                        }, `*`);
                        return
                    }
                    let t = i.exclude || [`[data-stitch-injected]`];
                    window.scrollTo(0, 0), l.style.width = a + `px`, l.style.height = o + `px`, l.style
                        .overflow = `hidden`, l.style.position = `relative`;
                    let u = (await (await e(document.documentElement, {
                        exclude: t,
                        embedFonts: !0,
                        scale: i.scale || 1,
                        quality: i.quality || 1,
                        plugins: [{
                            name: `stitch-viewport-clip`,
                            afterClone: function(e) {
                                let t = e.clone;
                                if (!(t instanceof HTMLElement)) return;
                                t.style.position = `relative`, t.style.width =
                                    a + `px`, t.style.height = o + `px`, t.style
                                    .overflow = `hidden`;
                                let n = [],
                                    r = t.querySelectorAll(`*`);
                                for (let e = 0; e < r.length; e++) {
                                    let t = r[e];
                                    t instanceof HTMLElement && (t.style
                                        .position || (t
                                            .__snapdomComputedStyle ||
                                            window.getComputedStyle(t))
                                        .position) === `fixed` && n.push(t)
                                }
                                if (s !== 0 || c !== 0) {
                                    let e = t.querySelector(`body`);
                                    e && (e.style.marginTop = -c + `px`, e.style
                                        .marginLeft = -s + `px`)
                                }
                                for (let e = 0; e < n.length; e++) n[e].style
                                    .position = `absolute`, t.appendChild(n[e])
                            }
                        }]
                    })).toCanvas({
                        width: a,
                        height: o
                    })).toDataURL(`image/png`);
                    window.parent.postMessage({
                        type: `screenshot_captured`,
                        requestId: n,
                        dataUrl: u,
                        width: a,
                        height: o
                    }, `*`)
                } catch (e) {
                    window.parent.postMessage({
                        type: `screenshot_error`,
                        requestId: n,
                        error: e instanceof Error ? e.message : String(e)
                    }, `*`)
                } finally {
                    l.style.width = u, l.style.height = d, l.style.overflow = f, l.style.position = p,
                        window.scrollTo(s, c)
                }
            })
        })();
    </script>
    <script data-stitch-injected="">
        (function Re() {
            let e = `__stitch-highlight-css`,
                t = `stitch-highlight-element`,
                n = null;

            function r() {
                if (document.getElementById(e)) return;
                let n = document.createElement(`style`);
                n.id = e, n.textContent = [`@keyframes stitch-highlight-pulse {`,
                    `  0%, 100% { box-shadow: 0 0 0 3px rgba(113,105,237,0.8), 0 0 12px 4px rgba(113,105,237,0.3); }`,
                    `  50%      { box-shadow: 0 0 0 3px rgba(113,105,237,0.4), 0 0 6px 2px rgba(113,105,237,0.15); }`,
                    `}`, `.` + t + ` {`, `  outline: 3px solid rgba(113,105,237,0.8) !important;`,
                    `  outline-offset: 2px !important;`,
                    `  animation: stitch-highlight-pulse 1.5s ease-in-out infinite !important;`,
                    `  border-radius: inherit;`, `}`
                ].join(`
`), document.head.appendChild(n)
            }

            function i(e) {
                let t = e.toLowerCase().trim(),
                    n = document.createTreeWalker(document.body, NodeFilter.SHOW_ELEMENT, null),
                    r = null,
                    i = -1,
                    a = n.nextNode();
                for (; a;) {
                    if ((a.textContent || ``).trim().toLowerCase().includes(t)) {
                        let e = 0,
                            t = a.parentElement;
                        for (; t;) e++, t = t.parentElement;
                        e > i && (i = e, r = a)
                    }
                    a = n.nextNode()
                }
                return r
            }

            function a(e) {
                setTimeout(function() {
                    let t = e.getBoundingClientRect(),
                        n = window.innerWidth || 1,
                        r = window.innerHeight || 1;
                    window.parent.postMessage({
                        type: `stitch:highlight-element-rect`,
                        normalizedX: (t.left + t.width / 2) / n,
                        normalizedY: (t.top + t.height / 2) / r,
                        normalizedWidth: t.width / n,
                        normalizedHeight: t.height / r
                    }, `*`)
                }, 400)
            }
            window.addEventListener(`message`, function(e) {
                if (!e.data || e.data.type !== `stitch:highlight-element`) return;
                n &&= (n.classList.remove(t), null);
                let {
                    text: o,
                    selector: s
                } = e.data;
                if (!o && !s) return;
                r();
                let c = null;
                if (o && (c = i(o)), !c && s) try {
                    c = document.querySelector(s)
                } catch {}
                c && (c.classList.add(t), c.scrollIntoView({
                    behavior: `smooth`,
                    block: `center`
                }), n = c, a(c))
            })
        })();
    </script>
    <script data-stitch-injected="">
        (function Ve() {
            function e() {
                window.parent.postMessage({
                    type: `stitch:content-dimensions`,
                    height: document.documentElement.scrollHeight
                }, `*`)
            }
            document.readyState === `loading` ? document.addEventListener(`DOMContentLoaded`, () => setTimeout(e, 50)) :
                setTimeout(e, 50), window.addEventListener(`load`, () => setTimeout(e, 100))
        })();
    </script>
    <style>
        *,
        ::before,
        ::after {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-gradient-from-position: ;
            --tw-gradient-via-position: ;
            --tw-gradient-to-position: ;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia: ;
            --tw-contain-size: ;
            --tw-contain-layout: ;
            --tw-contain-paint: ;
            --tw-contain-style:
        }

        ::backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-gradient-from-position: ;
            --tw-gradient-via-position: ;
            --tw-gradient-to-position: ;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia: ;
            --tw-contain-size: ;
            --tw-contain-layout: ;
            --tw-contain-paint: ;
            --tw-contain-style:
        }

        /* ! tailwindcss v3.4.17 | MIT License | https://tailwindcss.com */
        *,
        ::after,
        ::before {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb
        }

        ::after,
        ::before {
            --tw-content: ''
        }

        :host,
        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            tab-size: 4;
            font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-feature-settings: normal;
            font-variation-settings: normal;
            -webkit-tap-highlight-color: transparent
        }

        body {
            margin: 0;
            line-height: inherit
        }

        hr {
            height: 0;
            color: inherit;
            border-top-width: 1px
        }

        abbr:where([title]) {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: inherit;
            font-weight: inherit
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        b,
        strong {
            font-weight: bolder
        }

        code,
        kbd,
        pre,
        samp {

            font-family:ui-monospace,
            SFMono-Regular,
            Menlo,
            Monaco,
            Consolas,
            "Liberation Mono",
            "Courier New",
            monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}button,input:where([type=button]),input:where([type=reset]),input:where([type=submit]){-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]:where(:not([hidden=until-found])){display:none}[type='text'],
            input:where(:not([type])),
            [type='email'],
            [type='url'],
            [type='password'],
            [type='number'],
            [type='date'],
            [type='datetime-local'],
            [type='month'],
            [type='search'],
            [type='tel'],
            [type='time'],
            [type='week'],
            [multiple],
            textarea,
            select {
                -webkit-appearance: none;
                appearance: none;
                background-color: #fff;
                border-color: #6b7280;
                border-width: 1px;
                border-radius: 0px;
                padding-top: 0.5rem;
                padding-right: 0.75rem;
                padding-bottom: 0.5rem;
                padding-left: 0.75rem;
                font-size: 1rem;
                line-height: 1.5rem;

                --tw-shadow:0 0 #0000;}[type='text']:focus,
                input:where(:not([type])):focus,
                [type='email']:focus,
                [type='url']:focus,
                [type='password']:focus,
                [type='number']:focus,
                [type='date']:focus,
                [type='datetime-local']:focus,
                [type='month']:focus,
                [type='search']:focus,
                [type='tel']:focus,
                [type='time']:focus,
                [type='week']:focus,
                [multiple]:focus,
                textarea:focus,
                select:focus {
                    outline: 2px solid transparent;
                    outline-offset: 2px;
                    --tw-ring-inset: var(--tw-empty,
                            /*!*/
                            /*!*/
                        );
                    --tw-ring-offset-width: 0px;
                    --tw-ring-offset-color: #fff;
                    --tw-ring-color: #2563eb;
                    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                    box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
                    border-color: #2563eb
                }

                input::placeholder,
                textarea::placeholder {
                    color: #6b7280;
                    opacity: 1
                }

                ::-webkit-datetime-edit-fields-wrapper {
                    padding: 0
                }

                ::-webkit-date-and-time-value {
                    min-height: 1.5em;
                    text-align: inherit
                }

                ::-webkit-datetime-edit {
                    display: inline-flex
                }

                ::-webkit-datetime-edit,
                ::-webkit-datetime-edit-year-field,
                ::-webkit-datetime-edit-month-field,
                ::-webkit-datetime-edit-day-field,
                ::-webkit-datetime-edit-hour-field,
                ::-webkit-datetime-edit-minute-field,
                ::-webkit-datetime-edit-second-field,
                ::-webkit-datetime-edit-millisecond-field,
                ::-webkit-datetime-edit-meridiem-field {
                    padding-top: 0;
                    padding-bottom: 0
                }

                select {
                    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
                    background-position: right 0.5rem center;
                    background-repeat: no-repeat;

                    background-size: 1.5em 1.5em;padding-right:2.5rem;print-color-adjust:exact}[multiple],[size]:where(select:not([size="1"])) {
                        background-image: initial;
                        background-position: initial;
                        background-repeat: unset;
                        background-size: initial;
                        padding-right: 0.75rem;
                        print-color-adjust: unset
                    }

                    [type='checkbox'],
                    [type='radio'] {
                        -webkit-appearance: none;
                        appearance: none;
                        padding: 0;
                        print-color-adjust: exact;
                        display: inline-block;
                        vertical-align: middle;
                        background-origin: border-box;
                        -webkit-user-select: none;
                        user-select: none;
                        flex-shrink: 0;
                        height: 1rem;
                        width: 1rem;
                        color: #2563eb;
                        background-color: #fff;
                        border-color: #6b7280;
                        border-width: 1px;

                        --tw-shadow:0 0 #0000}[type='checkbox'] {
                            border-radius: 0px
                        }

                        [type='radio'] {
                            border-radius: 100%
                        }

                        [type='checkbox']:focus,
                        [type='radio']:focus {
                            outline: 2px solid transparent;
                            outline-offset: 2px;
                            --tw-ring-inset: var(--tw-empty,
                                    /*!*/
                                    /*!*/
                                );
                            --tw-ring-offset-width: 2px;
                            --tw-ring-offset-color: #fff;
                            --tw-ring-color: #2563eb;
                            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);

                            box-shadow:var(--tw-ring-offset-shadow),
                            var(--tw-ring-shadow),
                            var(--tw-shadow)}[type='checkbox']:checked,
                            [type='radio']:checked {
                                border-color: transparent;
                                background-color: currentColor;

                                background-size:100% 100%;background-position:center;background-repeat:no-repeat}[type='checkbox']:checked {
                                    background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e");
                                }

                                @media (forced-colors: active) {[type='checkbox']:checked {
                                    -webkit-appearance: auto;
                                    appearance: auto
                                }
                            }

                            [type='radio']:checked {
                                background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
                            }

                            @media (forced-colors: active) {[type='radio']:checked {
                                -webkit-appearance: auto;
                                appearance: auto
                            }
                        }

                        [type='checkbox']:checked:hover,
                        [type='checkbox']:checked:focus,
                        [type='radio']:checked:hover,
                        [type='radio']:checked:focus {
                            border-color: transparent;
                            background-color: currentColor
                        }

                        [type='checkbox']:indeterminate {
                            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16'%3e%3cpath stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 8h8'/%3e%3c/svg%3e");
                            border-color: transparent;
                            background-color: currentColor;
                            background-size: 100% 100%;
                            background-position: center;
                            background-repeat: no-repeat;
                        }

                        @media (forced-colors: active) {[type='checkbox']:indeterminate {
                            -webkit-appearance: auto;
                            appearance: auto
                        }
                    }

                    [type='checkbox']:indeterminate:hover,
                    [type='checkbox']:indeterminate:focus {
                        border-color: transparent;
                        background-color: currentColor
                    }

                    [type='file'] {
                        background: unset;
                        border-color: inherit;
                        border-width: 0;
                        border-radius: 0;
                        padding: 0;
                        font-size: unset;
                        line-height: inherit
                    }

                    [type='file']:focus {
                        outline: 1px solid ButtonText;
                        outline: 1px auto -webkit-focus-ring-color
                    }

                    .fixed {
                        position: fixed
                    }

                    .absolute {
                        position: absolute
                    }

                    .relative {
                        position: relative
                    }

                    .inset-0 {
                        inset: 0px
                    }

                    .right-0 {
                        right: 0px
                    }

                    .top-0 {
                        top: 0px
                    }

                    .-z-10 {
                        z-index: -10
                    }

                    .z-10 {
                        z-index: 10
                    }

                    .z-50 {
                        z-index: 50
                    }

                    .mx-auto {
                        margin-left: auto;
                        margin-right: auto
                    }

                    .mb-10 {
                        margin-bottom: 2.5rem
                    }

                    .mb-16 {
                        margin-bottom: 4rem
                    }

                    .mb-2 {
                        margin-bottom: 0.5rem
                    }

                    .mb-4 {
                        margin-bottom: 1rem
                    }

                    .mb-6 {
                        margin-bottom: 1.5rem
                    }

                    .mb-8 {
                        margin-bottom: 2rem
                    }

                    .mr-1 {
                        margin-right: 0.25rem
                    }

                    .mr-4 {
                        margin-right: 1rem
                    }

                    .mt-4 {
                        margin-top: 1rem
                    }

                    .mt-8 {
                        margin-top: 2rem
                    }

                    .block {
                        display: block
                    }

                    .flex {
                        display: flex
                    }

                    .inline-flex {
                        display: inline-flex
                    }

                    .grid {
                        display: grid
                    }

                    .hidden {
                        display: none
                    }

                    .h-10 {
                        height: 2.5rem
                    }

                    .h-12 {
                        height: 3rem
                    }

                    .h-2 {
                        height: 0.5rem
                    }

                    .h-20 {
                        height: 5rem
                    }

                    .h-32 {
                        height: 8rem
                    }

                    .h-48 {
                        height: 12rem
                    }

                    .h-8 {
                        height: 2rem
                    }

                    .h-full {
                        height: 100%
                    }

                    .w-10 {
                        width: 2.5rem
                    }

                    .w-12 {
                        width: 3rem
                    }

                    .w-2 {
                        width: 0.5rem
                    }

                    .w-32 {
                        width: 8rem
                    }

                    .w-full {
                        width: 100%
                    }

                    .max-w-2xl {
                        max-width: 42rem
                    }

                    .max-w-7xl {
                        max-width: 80rem
                    }

                    .max-w-xl {
                        max-width: 36rem
                    }

                    .-translate-y-8 {
                        --tw-translate-y: -2rem;
                        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
                    }

                    .translate-x-8 {
                        --tw-translate-x: 2rem;
                        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
                    }

                    .cursor-pointer {
                        cursor: pointer
                    }

                    .cursor-text {
                        cursor: text
                    }

                    .grid-cols-1 {
                        grid-template-columns: repeat(1, minmax(0, 1fr))
                    }

                    .grid-cols-2 {
                        grid-template-columns: repeat(2, minmax(0, 1fr))
                    }

                    .flex-col {
                        flex-direction: column
                    }

                    .flex-wrap {
                        flex-wrap: wrap
                    }

                    .items-center {
                        align-items: center
                    }

                    .justify-center {
                        justify-content: center
                    }

                    .justify-between {
                        justify-content: space-between
                    }

                    .gap-12 {
                        gap: 3rem
                    }

                    .gap-16 {
                        gap: 4rem
                    }

                    .gap-2 {
                        gap: 0.5rem
                    }

                    .gap-4 {
                        gap: 1rem
                    }

                    .gap-6 {
                        gap: 1.5rem
                    }

                    .gap-8 {
                        gap: 2rem
                    }

                    .gap-gutter {
                        gap: 24px
                    }

                    .gap-y-2 {
                        row-gap: 0.5rem
                    }

                    .-space-x-3> :not([hidden])~ :not([hidden]) {
                        --tw-space-x-reverse: 0;
                        margin-right: calc(-0.75rem * var(--tw-space-x-reverse));
                        margin-left: calc(-0.75rem * calc(1 - var(--tw-space-x-reverse)))
                    }

                    .space-x-8> :not([hidden])~ :not([hidden]) {
                        --tw-space-x-reverse: 0;
                        margin-right: calc(2rem * var(--tw-space-x-reverse));
                        margin-left: calc(2rem * calc(1 - var(--tw-space-x-reverse)))
                    }

                    .space-y-4> :not([hidden])~ :not([hidden]) {
                        --tw-space-y-reverse: 0;
                        margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse)));
                        margin-bottom: calc(1rem * var(--tw-space-y-reverse))
                    }

                    .space-y-6> :not([hidden])~ :not([hidden]) {
                        --tw-space-y-reverse: 0;
                        margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
                        margin-bottom: calc(1.5rem * var(--tw-space-y-reverse))
                    }

                    .space-y-8> :not([hidden])~ :not([hidden]) {
                        --tw-space-y-reverse: 0;
                        margin-top: calc(2rem * calc(1 - var(--tw-space-y-reverse)));
                        margin-bottom: calc(2rem * var(--tw-space-y-reverse))
                    }

                    .overflow-hidden {
                        overflow: hidden
                    }

                    .rounded-full {
                        border-radius: 0.75rem
                    }

                    .border {
                        border-width: 1px
                    }

                    .border-2 {
                        border-width: 2px
                    }

                    .border-y {
                        border-top-width: 1px;
                        border-bottom-width: 1px
                    }

                    .border-b {
                        border-bottom-width: 1px
                    }

                    .border-b-2 {
                        border-bottom-width: 2px
                    }

                    .border-t {
                        border-top-width: 1px
                    }

                    .border-on-tertiary-container\/0 {
                        border-color: rgb(12 148 136 / 0)
                    }

                    .border-slate-100 {
                        --tw-border-opacity: 1;
                        border-color: rgb(241 245 249 / var(--tw-border-opacity, 1))
                    }

                    .border-slate-200 {
                        --tw-border-opacity: 1;
                        border-color: rgb(226 232 240 / var(--tw-border-opacity, 1))
                    }

                    .border-slate-600 {
                        --tw-border-opacity: 1;
                        border-color: rgb(71 85 105 / var(--tw-border-opacity, 1))
                    }

                    .border-teal-600 {
                        --tw-border-opacity: 1;
                        border-color: rgb(13 148 136 / var(--tw-border-opacity, 1))
                    }

                    .border-white {
                        --tw-border-opacity: 1;
                        border-color: rgb(255 255 255 / var(--tw-border-opacity, 1))
                    }

                    .bg-background {
                        --tw-bg-opacity: 1;
                        background-color: rgb(247 249 251 / var(--tw-bg-opacity, 1))
                    }

                    .bg-on-tertiary-container {
                        --tw-bg-opacity: 1;
                        background-color: rgb(12 148 136 / var(--tw-bg-opacity, 1))
                    }

                    .bg-primary-container {
                        --tw-bg-opacity: 1;
                        background-color: rgb(19 27 46 / var(--tw-bg-opacity, 1))
                    }

                    .bg-secondary-container\/20 {
                        background-color: rgb(208 225 251 / 0.2)
                    }

                    .bg-slate-50 {
                        --tw-bg-opacity: 1;
                        background-color: rgb(248 250 252 / var(--tw-bg-opacity, 1))
                    }

                    .bg-slate-50\/50 {
                        background-color: rgb(248 250 252 / 0.5)
                    }

                    .bg-tertiary-fixed\/20 {
                        background-color: rgb(137 245 231 / 0.2)
                    }

                    .bg-transparent {
                        background-color: transparent
                    }

                    .bg-white {
                        --tw-bg-opacity: 1;
                        background-color: rgb(255 255 255 / var(--tw-bg-opacity, 1))
                    }

                    .bg-white\/95 {
                        background-color: rgb(255 255 255 / 0.95)
                    }

                    .bg-\[url\(\'https\:\/\/www\.transparenttextures\.com\/patterns\/cubes\.png\'\)\] {
                        background-image: url('https://www.transparenttextures.com/patterns/cubes.png')
                    }

                    .object-contain {
                        object-fit: contain
                    }

                    .object-cover {
                        object-fit: cover
                    }

                    .p-3 {
                        padding: 0.75rem
                    }

                    .p-6 {
                        padding: 1.5rem
                    }

                    .p-8 {
                        padding: 2rem
                    }

                    .px-10 {
                        padding-left: 2.5rem;
                        padding-right: 2.5rem
                    }

                    .px-2 {
                        padding-left: 0.5rem;
                        padding-right: 0.5rem
                    }

                    .px-3 {
                        padding-left: 0.75rem;
                        padding-right: 0.75rem
                    }

                    .px-6 {
                        padding-left: 1.5rem;
                        padding-right: 1.5rem
                    }

                    .px-8 {
                        padding-left: 2rem;
                        padding-right: 2rem
                    }

                    .py-1 {
                        padding-top: 0.25rem;
                        padding-bottom: 0.25rem
                    }

                    .py-12 {
                        padding-top: 3rem;
                        padding-bottom: 3rem
                    }

                    .py-16 {
                        padding-top: 4rem;
                        padding-bottom: 4rem
                    }

                    .py-2\.5 {
                        padding-top: 0.625rem;
                        padding-bottom: 0.625rem
                    }

                    .py-20 {
                        padding-top: 5rem;
                        padding-bottom: 5rem
                    }

                    .py-24 {
                        padding-top: 6rem;
                        padding-bottom: 6rem
                    }

                    .py-4 {
                        padding-top: 1rem;
                        padding-bottom: 1rem
                    }

                    .py-8 {
                        padding-top: 2rem;
                        padding-bottom: 2rem
                    }

                    .py-section-gap {
                        padding-top: 80px;
                        padding-bottom: 80px
                    }

                    .pb-1 {
                        padding-bottom: 0.25rem
                    }

                    .pt-20 {
                        padding-top: 5rem
                    }

                    .pt-4 {
                        padding-top: 1rem
                    }

                    .text-center {
                        text-align: center
                    }

                    .font-body-lg {
                        font-family: Inter
                    }

                    .font-body-md {
                        font-family: Inter
                    }

                    .font-display-xl {
                        font-family: Public Sans
                    }

                    .font-headline-lg {
                        font-family: Public Sans
                    }

                    .font-headline-md {
                        font-family: Public Sans
                    }

                    .font-label-bold {
                        font-family: Inter
                    }

                    .text-body-lg {
                        font-size: 18px;
                        line-height: 1.6;
                        font-weight: 400
                    }

                    .text-caption {
                        font-size: 12px;
                        line-height: 1.4;
                        font-weight: 400
                    }

                    .text-display-xl {
                        font-size: 48px;
                        line-height: 1.1;
                        letter-spacing: -0.02em;
                        font-weight: 700
                    }

                    .text-headline-lg {
                        font-size: 32px;
                        line-height: 1.2;
                        font-weight: 600
                    }

                    .text-headline-md {
                        font-size: 24px;
                        line-height: 1.3;
                        font-weight: 600
                    }

                    .text-lg {
                        font-size: 1.125rem;
                        line-height: 1.75rem
                    }

                    .text-sm {
                        font-size: 0.875rem;
                        line-height: 1.25rem
                    }

                    .text-xl {
                        font-size: 1.25rem;
                        line-height: 1.75rem
                    }

                    .text-xs {
                        font-size: 0.75rem;
                        line-height: 1rem
                    }

                    .font-bold {
                        font-weight: 700
                    }

                    .font-extrabold {
                        font-weight: 800
                    }

                    .font-medium {
                        font-weight: 500
                    }

                    .font-semibold {
                        font-weight: 600
                    }

                    .uppercase {
                        text-transform: uppercase
                    }

                    .italic {
                        font-style: italic
                    }

                    .leading-relaxed {
                        line-height: 1.625
                    }

                    .leading-tight {
                        line-height: 1.25
                    }

                    .tracking-\[0\.2em\] {
                        letter-spacing: 0.2em
                    }

                    .tracking-tight {
                        letter-spacing: -0.025em
                    }

                    .tracking-tighter {
                        letter-spacing: -0.05em
                    }

                    .tracking-wider {
                        letter-spacing: 0.05em
                    }

                    .tracking-widest {
                        letter-spacing: 0.1em
                    }

                    .text-on-background {
                        --tw-text-opacity: 1;
                        color: rgb(25 28 30 / var(--tw-text-opacity, 1))
                    }

                    .text-on-tertiary-container {
                        --tw-text-opacity: 1;
                        color: rgb(12 148 136 / var(--tw-text-opacity, 1))
                    }

                    .text-slate-400 {
                        --tw-text-opacity: 1;
                        color: rgb(148 163 184 / var(--tw-text-opacity, 1))
                    }

                    .text-slate-500 {
                        --tw-text-opacity: 1;
                        color: rgb(100 116 139 / var(--tw-text-opacity, 1))
                    }

                    .text-slate-600 {
                        --tw-text-opacity: 1;
                        color: rgb(71 85 105 / var(--tw-text-opacity, 1))
                    }

                    .text-slate-700 {
                        --tw-text-opacity: 1;
                        color: rgb(51 65 85 / var(--tw-text-opacity, 1))
                    }

                    .text-slate-900 {
                        --tw-text-opacity: 1;
                        color: rgb(15 23 42 / var(--tw-text-opacity, 1))
                    }

                    .text-teal-600 {
                        --tw-text-opacity: 1;
                        color: rgb(13 148 136 / var(--tw-text-opacity, 1))
                    }

                    .text-white {
                        --tw-text-opacity: 1;
                        color: rgb(255 255 255 / var(--tw-text-opacity, 1))
                    }

                    .antialiased {
                        -webkit-font-smoothing: antialiased;
                        -moz-osx-font-smoothing: grayscale
                    }

                    .opacity-10 {
                        opacity: 0.1
                    }

                    .opacity-60 {
                        opacity: 0.6
                    }

                    .shadow-lg {
                        --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
                        --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
                        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
                    }

                    .shadow-sm {
                        --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
                        --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
                        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
                    }

                    .shadow-xl {
                        --tw-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
                        --tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);
                        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
                    }

                    .shadow-teal-900\/20 {
                        --tw-shadow-color: rgb(19 78 74 / 0.2);
                        --tw-shadow: var(--tw-shadow-colored)
                    }

                    .grayscale {
                        --tw-grayscale: grayscale(100%);
                        filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)
                    }

                    .backdrop-blur-md {
                        --tw-backdrop-blur: blur(12px);
                        -webkit-backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
                        backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia)
                    }

                    .transition-all {
                        transition-property: all;
                        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                        transition-duration: 150ms
                    }

                    .transition-colors {
                        transition-property: color, background-color, border-color, fill, stroke, -webkit-text-decoration-color;
                        transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
                        transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, -webkit-text-decoration-color;
                        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                        transition-duration: 150ms
                    }

                    .transition-shadow {
                        transition-property: box-shadow;
                        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                        transition-duration: 150ms
                    }

                    .transition-transform {
                        transition-property: transform;
                        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                        transition-duration: 150ms
                    }

                    .duration-200 {
                        transition-duration: 200ms
                    }

                    .duration-300 {
                        transition-duration: 300ms
                    }

                    .duration-500 {
                        transition-duration: 500ms
                    }

                    .hover\:scale-110:hover {
                        --tw-scale-x: 1.1;
                        --tw-scale-y: 1.1;
                        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
                    }

                    .hover\:border-on-tertiary-container:hover {
                        --tw-border-opacity: 1;
                        border-color: rgb(12 148 136 / var(--tw-border-opacity, 1))
                    }

                    .hover\:bg-on-tertiary-container\/90:hover {
                        background-color: rgb(12 148 136 / 0.9)
                    }

                    .hover\:bg-white\/5:hover {
                        background-color: rgb(255 255 255 / 0.05)
                    }

                    .hover\:text-slate-900:hover {
                        --tw-text-opacity: 1;
                        color: rgb(15 23 42 / var(--tw-text-opacity, 1))
                    }

                    .hover\:text-teal-600:hover {
                        --tw-text-opacity: 1;
                        color: rgb(13 148 136 / var(--tw-text-opacity, 1))
                    }

                    .hover\:shadow-lg:hover {
                        --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
                        --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
                        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
                    }

                    .hover\:grayscale-0:hover {
                        --tw-grayscale: grayscale(0);
                        filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)
                    }

                    .focus\:border-on-primary-fixed:focus {
                        --tw-border-opacity: 1;
                        border-color: rgb(19 27 46 / var(--tw-border-opacity, 1))
                    }

                    .focus\:ring-on-primary-fixed:focus {
                        --tw-ring-opacity: 1;
                        --tw-ring-color: rgb(19 27 46 / var(--tw-ring-opacity, 1))
                    }

                    .active\:scale-95:active {
                        --tw-scale-x: .95;
                        --tw-scale-y: .95;
                        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
                    }

                    .group:hover .group-hover\:translate-x-1 {
                        --tw-translate-x: 0.25rem;
                        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
                    }

                    @media (min-width: 640px) {
                        .sm\:flex-row {
                            flex-direction: row
                        }
                    }

                    @media (min-width: 768px) {
                        .md\:flex {
                            display: flex
                        }

                        .md\:grid-cols-2 {
                            grid-template-columns: repeat(2, minmax(0, 1fr))
                        }

                        .md\:grid-cols-3 {
                            grid-template-columns: repeat(3, minmax(0, 1fr))
                        }

                        .md\:grid-cols-4 {
                            grid-template-columns: repeat(4, minmax(0, 1fr))
                        }

                        .md\:flex-row {
                            flex-direction: row
                        }

                        .md\:items-end {
                            align-items: flex-end
                        }
                    }

                    @media (min-width: 1024px) {
                        .lg\:grid-cols-2 {
                            grid-template-columns: repeat(2, minmax(0, 1fr))
                        }

                        .lg\:grid-cols-4 {
                            grid-template-columns: repeat(4, minmax(0, 1fr))
                        }

                        .lg\:p-10 {
                            padding: 2.5rem
                        }

                        .lg\:py-32 {
                            padding-top: 8rem;
                            padding-bottom: 8rem
                        }
                    }
    </style>
</head>

<body class="bg-background font-body-md text-on-background">
    <!-- TopNavBar -->
    <header class="fixed top-0 w-full z-50 border-b bg-white/95 backdrop-blur-md border-slate-200 shadow-sm">
        <nav class="flex justify-between items-center max-w-7xl mx-auto px-8 h-20">
            <div class="text-xl font-extrabold tracking-tighter text-slate-900 uppercase font-display-xl">
                Specter Training
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a class="text-teal-600 font-semibold border-b-2 border-teal-600 pb-1 font-public-sans antialiased text-sm tracking-tight transition-all duration-200"
                    href="#">Home</a>
                <a class="text-slate-600 font-medium font-public-sans antialiased text-sm tracking-tight hover:text-teal-600 transition-all duration-200"
                    href="#">Qualifications</a>
                <a class="text-slate-600 font-medium font-public-sans antialiased text-sm tracking-tight hover:text-teal-600 transition-all duration-200"
                    href="#">Booking</a>
                <a class="text-slate-600 font-medium font-public-sans antialiased text-sm tracking-tight hover:text-teal-600 transition-all duration-200"
                    href="#">About</a>
                <a class="text-slate-600 font-medium font-public-sans antialiased text-sm tracking-tight hover:text-teal-600 transition-all duration-200"
                    href="#">Contact</a>
            </div>
            <div class="flex items-center gap-4">
                <button
                    class="bg-on-tertiary-container text-white px-6 py-2.5 font-label-bold text-sm active:scale-95 transition-transform">
                    Apply Now
                </button>
            </div>
        </nav>
    </header>
    <main class="pt-20">
        <!-- Hero Section Split Layout -->
        <section class="hero-gradient overflow-hidden">
            <div class="max-w-7xl mx-auto px-8 py-20 lg:py-32 grid lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-white border border-slate-200 rounded-full">
                        <span class="w-2 h-2 rounded-full bg-on-tertiary-container"></span>
                        <span class="font-label-bold text-caption uppercase tracking-wider text-slate-600">Nationally
                            Accredited Training</span>
                    </div>
                    <h1 class="font-display-xl text-display-xl text-slate-900 leading-tight">
                        Elevate Your Career with <span class="text-on-tertiary-container">Industry-Leading</span>
                        Qualifications.
                    </h1>
                    <p class="font-body-lg text-body-lg text-slate-600 max-w-xl">
                        Gain the skills and recognition you need to excel in today's competitive job market through our
                        specialized professional development programs.
                    </p>
                    <div class="flex items-center gap-4">
                        <button
                            class="bg-on-tertiary-container text-white px-8 py-4 font-label-bold text-md shadow-lg shadow-teal-900/20 active:scale-95 transition-all">
                            Explore All Courses
                        </button>
                        <div class="flex -space-x-3">
                            <img class="w-10 h-10 rounded-full border-2 border-white object-cover"
                                data-alt="close-up portrait of a professional woman smiling in a bright office environment"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDG-4z1G68oQl-iGXiNYqGO3Yk26VB5WfqeAMhffyIz4YQFTWmEIRvh06FjhfKw3r6n3gmV3nkzfefju3jUrTyjy3jgvjtcnZErBZHYMlvy48LVfyZAfXNJrqkSuFDhEpeLfS3Inc19657BKI25hJJjOiRdJUzxKXuInZ8lPO43vrCfeDieCnmfHuxP6bmxZC_jvKlIvdITi0Q9aGU9DWairVcw-ujOtZNXzV-hfcO0oU3FXELuz9op6aKg4dEEfdhZMzTIRZSdzw">
                            <img class="w-10 h-10 rounded-full border-2 border-white object-cover"
                                data-alt="headshot of a smiling young businessman in a professional setting with soft lighting"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHlSf5WdrLHKl1ibjPuvDYLhdzssgapeCNQhzWAs-kUqHFSJpiVBGvtG7j8XL9zRTqxkxsm5eZNrHk0_y_SMoivLMSxViylcwj354xgAvCS3EGR2_HeKsmM6lz5XLsBAWXQ8knFci4pOjpzL7MfwtK-aQjc9WSUKLg87qEWtn5PTMmN19a-QEgdZq1aPR4gLPb05gKc_CGXRrWAI0pPmHjF4J2BsBWrmE9BbDhEM_mQRTD20tbY3upRSFrc345oNFlDueGRCJEgw">
                            <img class="w-10 h-10 rounded-full border-2 border-white object-cover"
                                data-alt="professional portrait of a man in a modern office with natural daylight"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBDPaIO2t11KyDe5cCI6etrcRdFYBBLRBX1zVW4ks0o7i3MKBaxY6rwOrHrsg_9N2giyU4uWj1c_tBsI-jQtFbbaxvpjBzh9reL6y40xPCIuLyhVku4FyTP9ITLlWoeDWJ2cqau8NhpkuRQmhjlWrdvR9t-J1n3VxZ9KjXEfrsCWBReimdebq4E86ecGOQvXI7NHFC99EGTWKfCaBJrnoSgkaosNbe2nQO8ocumfzCk2dztTcSfoko8Y3sC3lPdhp0fph5VAXRDNg">
                        </div>
                        <span class="text-caption font-label-bold text-slate-500">Joined by 2,000+ Students</span>
                    </div>
                </div>
                <!-- Conversion Form -->
                <div class="bg-white p-8 lg:p-10 border border-slate-200 shadow-xl relative">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-secondary-container/20 -z-10 translate-x-8 -translate-y-8">
                    </div>
                    <div class="space-y-6">
                        <h2 class="font-headline-md text-headline-md text-slate-900">Apply for Admission</h2>
                        <p class="text-slate-500 font-body-md">Fill out the form below and an education consultant will
                            contact you within 24 hours.</p>
                        <form class="space-y-4">
                            <div>
                                <label class="block font-label-bold text-slate-700 mb-2">Full Name</label>
                                <input
                                    class="w-full border-slate-200 focus:border-on-primary-fixed focus:ring-on-primary-fixed p-3 font-body-md transition-colors"
                                    placeholder="John Doe" type="text">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block font-label-bold text-slate-700 mb-2">Email Address</label>
                                    <input
                                        class="w-full border-slate-200 focus:border-on-primary-fixed focus:ring-on-primary-fixed p-3 font-body-md transition-colors"
                                        placeholder="john@example.com" type="email">
                                </div>
                                <div>
                                    <label class="block font-label-bold text-slate-700 mb-2">Phone Number</label>
                                    <input
                                        class="w-full border-slate-200 focus:border-on-primary-fixed focus:ring-on-primary-fixed p-3 font-body-md transition-colors"
                                        placeholder="+1 (555) 000-0000" type="tel">
                                </div>
                            </div>
                            <div>
                                <label class="block font-label-bold text-slate-700 mb-2">Interested Sector</label>
                                <select
                                    class="w-full border-slate-200 focus:border-on-primary-fixed focus:ring-on-primary-fixed p-3 font-body-md transition-colors">
                                    <option>Hospitality Management</option>
                                    <option>Retail Operations</option>
                                    <option>Advanced Manufacturing</option>
                                    <option>Business Administration</option>
                                </select>
                            </div>
                            <button
                                class="w-full bg-on-tertiary-container text-white py-4 font-label-bold text-lg active:scale-95 transition-transform mt-4"
                                type="submit">
                                Submit Application
                            </button>
                            <p class="text-center text-caption text-slate-400">By submitting, you agree to our Privacy
                                Policy.</p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Accreditation Logos -->
        <section class="bg-white py-12 border-y border-slate-100">
            <div class="max-w-7xl mx-auto px-8">
                <p class="text-center text-caption font-label-bold text-slate-400 uppercase tracking-[0.2em] mb-8">
                    Authorized Training Provider</p>
                <div
                    class="flex flex-wrap justify-center items-center gap-12 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
                    <img class="h-8 object-contain"
                        data-alt="clean geometric logo of a professional education authority in black and white"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDaaDDmB5K3ELXnrgsQ4k2IBc8_x3-BJTCCTXhbQ3mc9IRvjcZlOpdxrlpjkX5MaamAYeqwiySROL4C7HoGcnr0rBoPSFZq9VzAZz07YoyoAghQ8Peom8OLf0snI6eFEXGHaK2RVfjj0DLEC_zTTA7WSFXKougbJQssag8KGsCHv16rMV1baNWyp5wnMMjTwfMXgs6kR28-hj94iZhcydOS_FmuXoNj3TTuRa2oAfpVS-66X55BZaryZgjdkND0zar0AoW3WVv_cA">
                    <img class="h-8 object-contain"
                        data-alt="minimalist corporate logo for a training accreditation body with abstract symbol"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBLvLBmCy6gaXEy23Qx8e_h3iO_pzWvbBE8-XgZ0yre9iZKQupx3Cs2owBybOa1jSPuJV1SPDmo8y6f_2dan3O4vxzeS6AnVN6qW6npAuFo2yRqfsTF0DXqal1_7ii-4y53H5zBvAfMp5__ovCb41cDxDYoifEv38Ex3cjh5dgx8oyUMV2okC_0PNrG7SMXqKcBYV_h2-1IzcczQp13HiodvPFWAI5naLuT4aFI07K5GMJ50u5OIzyOA0xDgKdc2XujZ-yzi-vDCQ">
                    <img class="h-10 object-contain"
                        data-alt="modern typographical logo for a certification board with bold lines"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAzwPcL0WQCuJnWJ93r4biVNzgbkgNtAaZOSVzuvo3wnFuI6EL2d71UXZ1xX6UtYO94f2h7pbfOSWwekkckUTXSH4AU8jUpES2P4-CFvVT-pnAqVZfRunV-ktUaj__WuODhJDW_Oi3N65jwl7RiTLoQdWtV9qniq_QtLICxYGFLqUDWgdnmawW5Uqaq4W3wxOHKJqYR3gMYZPM3ItN2NRW4G1MQgowWcAGNjRCEn48eFJUlm-aM38N9SYLVwyrUmMrEkJnx2oVDJg">
                    <img class="h-8 object-contain"
                        data-alt="minimalist badge-style logo for an international education standards organization"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBRhqkSSlF6Dma735fkTGzVvUf4jSzcHmkDsTpx6bfNFh3eB9znFpN2VihZcgg-k9JcDyHNsoejrPyOX62dRoqvO35JTNnoCip12w6_KMyWwbvBmbPzkg1SWqH4FoPVWxzuuVDEKZq4WmHUucEFEnzIpiwrEu7GGJWcv9vqyQuyQ-FjsqfvUx_1wnM3JzHAXNd5CFLQC1LW3aSEdeDLuzP2xOx0EYaR2YxTEfHdmxAnAXxFGxYwhR8MWhQyLUdh7FpYUcztheFwWQ">
                    <img class="h-8 object-contain"
                        data-alt="sleek corporate mark for a global vocational training federation"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAUkoe46U7rth1ykPwClT02Hm_NQ77El09JBl897ygh-Lve3PLtbTDhZHeLrsgUX0z6ceHjvnTZ94zBJ8sHKvM8plzB_NsISYvAjBTvnjUm8tz_zIEYn97uNqhQjlmZ3VimvcwIAEWvJO-Pn1LUrDrjAU9gSGrW5-q-53Wmx9Eirfuu4Ur_4bWY6-MFZKZ-iTuHsZXqsxvSTbuVX7xHB7Qz3fcF7i9Tzixlq37BVAt1do5vJ0MB7JJodTqgMsaD6FhZzmSMcypxIQ">
                </div>
            </div>
        </section>
        <!-- Qualifications Overview -->
        <section class="py-section-gap bg-slate-50/50">
            <div class="max-w-7xl mx-auto px-8">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                    <div class="max-w-2xl">
                        <h2 class="font-headline-lg text-headline-lg text-slate-900 mb-4">World-Class Qualifications
                        </h2>
                        <p class="font-body-lg text-body-lg text-slate-600">Our programs are designed by industry
                            experts to provide practical, immediate value to your professional career.</p>
                    </div>
                    <a class="text-on-tertiary-container font-label-bold flex items-center gap-2 group border-b border-on-tertiary-container/0 hover:border-on-tertiary-container transition-all"
                        href="#">
                        View All Qualifications
                        <span
                            class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
                    <!-- Hospitality -->
                    <div class="qualification-card bg-white border border-slate-200 transition-all duration-300">
                        <div class="h-48 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                                data-alt="luxury hotel lobby interior with warm ambient lighting and professional reception staff"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDkZKdeJqQF7L22vk0JFLIvupO-CSG0cZMyqMvtrGTafXmDhKYwzAH7Td1icb7I4rlJVsrQWRXT9vJFSeDRZ80OmQeQd4MGnARTAI0Hu-NDncixmYvWjktLDUF1hkzivLtWx_QtaYnM7r82NwceSFqIHksDteoKF2Zh0_yWkVJGYMyB4PFq9Fmtlmg0tdLjC3mgTMAH4TJpyl0xtXpLJvS1mXO7dFJuQ4kjx0XvMTAge06Mlc3pw0T7LaR0jpgx-yzUMnOH-K_pGQ">
                        </div>
                        <div class="p-6 space-y-4">
                            <span
                                class="text-caption font-label-bold text-on-tertiary-container bg-tertiary-fixed/20 px-2 py-1 uppercase">Hospitality</span>
                            <h3 class="font-headline-md text-slate-900">Advanced Diploma of Hospitality</h3>
                            <div class="flex flex-wrap gap-y-2 text-slate-500 text-caption font-label-bold">
                                <span class="flex items-center mr-4"><span
                                        class="material-symbols-outlined text-sm mr-1">schedule</span> 12 Months</span>
                                <span class="flex items-center"><span
                                        class="material-symbols-outlined text-sm mr-1">school</span> Level 6</span>
                            </div>
                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-slate-900 font-label-bold">$4,250</span>
                                <button class="text-on-tertiary-container font-label-bold text-sm">Enroll Now</button>
                            </div>
                        </div>
                    </div>
                    <!-- Retail -->
                    <div class="qualification-card bg-white border border-slate-200 transition-all duration-300">
                        <div class="h-48 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                                data-alt="modern retail storefront with elegant clothing displays and clean minimalist interior design"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBeKnycj2uoeR2F-RrPyMomiu8NYBGrUJrcmnh3FM-8Ho_GRu9mMhs0y02HWW3peNat97mlazTMkwIHJe_agqxCm3lgVhJhR5qMGQxYSU7xlWSCt1wB4VWdrn2CJGU3kI506shjT_7w7NHY5n03FGmmzGev3e8Bqsr5CfRmS4TBpsm194LeMWFcjZAD7RRPb5OQH9zXRmaZL4uVaho1O-NWhFaHCDajciI8ism9SwVc-OmPCtAfleMT2MlKJZFHM4z4JOTq4JEb6A">
                        </div>
                        <div class="p-6 space-y-4">
                            <span
                                class="text-caption font-label-bold text-on-tertiary-container bg-tertiary-fixed/20 px-2 py-1 uppercase">Retail</span>
                            <h3 class="font-headline-md text-slate-900">Certificate IV in Retail Operations</h3>
                            <div class="flex flex-wrap gap-y-2 text-slate-500 text-caption font-label-bold">
                                <span class="flex items-center mr-4"><span
                                        class="material-symbols-outlined text-sm mr-1">schedule</span> 6 Months</span>
                                <span class="flex items-center"><span
                                        class="material-symbols-outlined text-sm mr-1">school</span> Level 4</span>
                            </div>
                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-slate-900 font-label-bold">$2,800</span>
                                <button class="text-on-tertiary-container font-label-bold text-sm">Enroll Now</button>
                            </div>
                        </div>
                    </div>
                    <!-- Manufacturing -->
                    <div class="qualification-card bg-white border border-slate-200 transition-all duration-300">
                        <div class="h-48 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                                data-alt="high-tech automated manufacturing facility with robotic arms and clean industrial aesthetic"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBGRnTZbxblGCFpjXdjkBB0l91JqxRWnZ4-YrivUKqFwJXNRRja_s6ER9YA640GL8KRqGoa_q-D19Lvn0EO8DPKx-Q_jDhpihbB-idDNzrmuWMz3h4gfxuhK--4MQIPGeLbsK9o0TqHKRVD6cwbf2Dj1Vdo-kTImXA0QEEEwVbxrPlCNJq36O6JwlGXviO1qHJvzwUR-t2qeNNtfWfE_lv1kyuZ6U-uJRl1z2n2iZjKfkTpGYiW6ME-_1UbUVNI-gHj_piakK0Shw">
                        </div>
                        <div class="p-6 space-y-4">
                            <span
                                class="text-caption font-label-bold text-on-tertiary-container bg-tertiary-fixed/20 px-2 py-1 uppercase">Manufacturing</span>
                            <h3 class="font-headline-md text-slate-900">Precision Systems Specialist</h3>
                            <div class="flex flex-wrap gap-y-2 text-slate-500 text-caption font-label-bold">
                                <span class="flex items-center mr-4"><span
                                        class="material-symbols-outlined text-sm mr-1">schedule</span> 18 Months</span>
                                <span class="flex items-center"><span
                                        class="material-symbols-outlined text-sm mr-1">school</span> Level 5</span>
                            </div>
                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-slate-900 font-label-bold">$5,100</span>
                                <button class="text-on-tertiary-container font-label-bold text-sm">Enroll Now</button>
                            </div>
                        </div>
                    </div>
                    <!-- Business -->
                    <div class="qualification-card bg-white border border-slate-200 transition-all duration-300">
                        <div class="h-48 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                                data-alt="contemporary boardroom with floor-to-ceiling windows and city skyline background in soft focus"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuD19hGktWPptAha1J0u086QqE115CbHd_iDkJ5fnfAArbdxHEuYYSjjK04bUobKa30wNNuLw9ohAXT4eWLlOdxy1GsSfLGDzm32soeZ3vFQVUJ_de7AxIE5617MHjR15oD61D9DrH2CVk8gO0YqCjvI_6UksCeCybAZL4pBHG2XylyKGGgvvbcD3JH3FmkgSqtN2PUbBCpiCmyQROjqsZCOIxXps3fnKL5OE2fPsB7Rn_1XT_ZDkVOK9Jd2XFJ9Z0Gs8L-dfhSjng">
                        </div>
                        <div class="p-6 space-y-4">
                            <span
                                class="text-caption font-label-bold text-on-tertiary-container bg-tertiary-fixed/20 px-2 py-1 uppercase">Business</span>
                            <h3 class="font-headline-md text-slate-900">Certificate in Business Leadership</h3>
                            <div class="flex flex-wrap gap-y-2 text-slate-500 text-caption font-label-bold">
                                <span class="flex items-center mr-4"><span
                                        class="material-symbols-outlined text-sm mr-1">schedule</span> 4 Months</span>
                                <span class="flex items-center"><span
                                        class="material-symbols-outlined text-sm mr-1">school</span> Level 3</span>
                            </div>
                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-slate-900 font-label-bold">$1,950</span>
                                <button class="text-on-tertiary-container font-label-bold text-sm">Enroll Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Social Proof Section -->
        <section class="py-section-gap bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-8">
                <div class="text-center mb-16">
                    <h2 class="font-headline-lg text-headline-lg text-slate-900 mb-4">Student Success Stories</h2>
                    <p class="font-body-lg text-body-lg text-slate-600 max-w-2xl mx-auto">Hear from our graduates who
                        have successfully transformed their careers through Specter Training.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div
                        class="p-8 border border-slate-200 flex flex-col justify-between hover:shadow-lg transition-shadow">
                        <div class="space-y-4">
                            <div class="flex text-on-tertiary-container">
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                            </div>
                            <p class="font-body-md italic text-slate-700 text-lg">"The Hospitality Diploma wasn't just
                                about theory; the practical assessments gave me the confidence to step into a management
                                role immediately after graduating."</p>
                        </div>
                        <div class="mt-8 flex items-center gap-4">
                            <img class="w-12 h-12 rounded-full object-cover"
                                data-alt="professional headshot of a female hospitality manager in a corporate setting"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHf1FYT6Kp288Q23NNyS5WlXWpePPvfbF5BO5zqnLeN_RNUCthrGQAgtRJ5a0oD68j1-3QUqC37NR_SxFNC8eYLemHlwx_pyAzMTngsXxs9H4WHKSOuvwDq3ijZpGPL2sUqsxqhZd68JhfnhwiO67f_JOEoXzmFGfYRdoBTDOh7gK4LZbiGupazm50cf6KeSQhUq3X78osv5PQKoUd8Xhh_ewh3xqys84E30Hewhkl4DRk3ovNvKJMg1ZQtzXOEt1pVBrVS31N2A">
                            <div>
                                <p class="font-label-bold text-slate-900">Sarah Jenkins</p>
                                <p class="text-caption text-slate-500 uppercase">Operations Manager, Grand Ritz</p>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 2 -->
                    <div
                        class="p-8 border border-slate-200 flex flex-col justify-between hover:shadow-lg transition-shadow">
                        <div class="space-y-4">
                            <div class="flex text-on-tertiary-container">
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                            </div>
                            <p class="font-body-md italic text-slate-700 text-lg">"As someone working in manufacturing
                                for 10 years, this certification validated my experience and updated my knowledge of
                                modern precision systems."</p>
                        </div>
                        <div class="mt-8 flex items-center gap-4">
                            <img class="w-12 h-12 rounded-full object-cover"
                                data-alt="headshot of a middle-aged male professional in a modern industrial workshop"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBonQJlYAmbVRqg2OKTK69nqZ-W8d7CAZab2MpvMPBjVNPZBM9q2lEZyMjCRnPRGNxVmaMFO7yU3RAIS75T3pNfdMadaN9i6Ex8RSP0T2c5_YxBSMqCsGr7qG4gxTdG6v3Go8cOO1Dg-gjtzhfPTgf-YUQH5nLS58lL4J7__wNJxhxGxiVI0RYS8uC0P7zQgjYtUCtkouPp419DY-vqpeE2Xh3tkKF8cEOhgOkKyA1AhI5xjdyqqX_o3eBBJpnS3W4mASDeEjwYsA">
                            <div>
                                <p class="font-label-bold text-slate-900">David Chen</p>
                                <p class="text-caption text-slate-500 uppercase">Lead Engineer, Apex Tech</p>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 3 -->
                    <div
                        class="p-8 border border-slate-200 flex flex-col justify-between hover:shadow-lg transition-shadow">
                        <div class="space-y-4">
                            <div class="flex text-on-tertiary-container">
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                            </div>
                            <p class="font-body-md italic text-slate-700 text-lg">"The flexible learning schedule
                                allowed me to complete my Retail Operations certificate while working full-time. I
                                received a promotion just two months later."</p>
                        </div>
                        <div class="mt-8 flex items-center gap-4">
                            <img class="w-12 h-12 rounded-full object-cover"
                                data-alt="smiling young female graduate in a professional retail setting"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDepbYHXq3PhgkZfj86V8rTMets3VLzXQe0qHyBmaYvZA1mpRDV4WS-ToH6dY61ViES2PUu6UskTB4PvzEUbj0GuK5RpQyUn9GVOEdhEANpeX-PBjpxoU1bFFX_-atj_MKU0EjMmDbZlxSETEFZsRZjKuhNvzGItFM8C6KEpVthFDfcmQCRjq2j0YoG9KJLv8ZkIEfWlkvtXWOYXx7Uwh2EH_4JaBiiDo6atBUrwF7udePpjvQtYSds6RgqyEeHYwZ-rx-De9AyOQ">
                            <div>
                                <p class="font-label-bold text-slate-900">Elena Rodriguez</p>
                                <p class="text-caption text-slate-500 uppercase">Store Supervisor, Voda Retail</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Final CTA Section -->
        <section class="py-24 bg-primary-container relative overflow-hidden">
            <div
                class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
            </div>
            <div class="max-w-7xl mx-auto px-8 relative z-10 text-center">
                <h2 class="font-display-xl text-display-xl text-white mb-6">Ready to Take the Next Step?</h2>
                <p class="font-body-lg text-body-lg text-slate-400 max-w-2xl mx-auto mb-10">Join hundreds of
                    professionals who have advanced their careers through our accredited programs.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <button
                        class="bg-on-tertiary-container text-white px-10 py-4 font-label-bold text-lg hover:bg-on-tertiary-container/90 transition-colors">
                        Apply for Enrollment
                    </button>
                    <button
                        class="bg-transparent text-white border border-slate-600 px-10 py-4 font-label-bold text-lg hover:bg-white/5 transition-colors">
                        Download Brochure
                    </button>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="w-full border-t bg-slate-50 border-slate-200">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 max-w-7xl mx-auto px-8 py-16">
            <div class="space-y-6">
                <div class="text-lg font-bold text-slate-900 font-public-sans">Specter Training</div>
                <p class="font-body-md text-slate-500 leading-relaxed">Authority in Education. Providing
                    industry-recognized training and qualifications for the modern workforce.</p>
                <div class="flex gap-4">
                    <a class="w-10 h-10 flex items-center justify-center bg-white border border-slate-200 text-slate-600 hover:text-teal-600 transition-colors"
                        href="#">
                        <span class="material-symbols-outlined text-lg">social_leaderboard</span>
                    </a>
                    <a class="w-10 h-10 flex items-center justify-center bg-white border border-slate-200 text-slate-600 hover:text-teal-600 transition-colors"
                        href="#">
                        <span class="material-symbols-outlined text-lg">language</span>
                    </a>
                </div>
            </div>
            <div class="space-y-6">
                <h4 class="font-label-bold text-slate-900 uppercase tracking-widest text-xs">Qualifications</h4>
                <ul class="space-y-4">
                    <li><a class="text-slate-500 font-medium hover:text-slate-900 transition-colors font-public-sans text-sm"
                            href="#">Hospitality</a></li>
                    <li><a class="text-slate-500 font-medium hover:text-slate-900 transition-colors font-public-sans text-sm"
                            href="#">Retail</a></li>
                    <li><a class="text-slate-500 font-medium hover:text-slate-900 transition-colors font-public-sans text-sm"
                            href="#">Manufacturing</a></li>
                    <li><a class="text-slate-500 font-medium hover:text-slate-900 transition-colors font-public-sans text-sm"
                            href="#">Business</a></li>
                </ul>
            </div>
            <div class="space-y-6">
                <h4 class="font-label-bold text-slate-900 uppercase tracking-widest text-xs">Resources</h4>
                <ul class="space-y-4">
                    <li><a class="text-slate-500 font-medium hover:text-slate-900 transition-colors font-public-sans text-sm"
                            href="#">Student Portal</a></li>
                    <li><a class="text-slate-500 font-medium hover:text-slate-900 transition-colors font-public-sans text-sm"
                            href="#">FAQs</a></li>
                    <li><a class="text-slate-500 font-medium hover:text-slate-900 transition-colors font-public-sans text-sm"
                            href="#">Funding Options</a></li>
                    <li><a class="text-slate-500 font-medium hover:text-slate-900 transition-colors font-public-sans text-sm"
                            href="#">Brochures</a></li>
                </ul>
            </div>
            <div class="space-y-6">
                <h4 class="font-label-bold text-slate-900 uppercase tracking-widest text-xs">Legal</h4>
                <ul class="space-y-4">
                    <li><a class="text-slate-500 font-medium hover:text-slate-900 transition-colors font-public-sans text-sm"
                            href="#">Privacy Policy</a></li>
                    <li><a class="text-slate-500 font-medium hover:text-slate-900 transition-colors font-public-sans text-sm"
                            href="#">Terms of Service</a></li>
                    <li><a class="text-slate-500 font-medium hover:text-slate-900 transition-colors font-public-sans text-sm"
                            href="#">Accreditations</a></li>
                    <li><a class="text-slate-500 font-medium hover:text-slate-900 transition-colors font-public-sans text-sm"
                            href="#">Cookie Policy</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-slate-200 py-8">
            <div class="max-w-7xl mx-auto px-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-500 font-body-md text-sm">© 2024 Specter Training. Authority in Education.</p>
                <div class="flex gap-8">
                    <span class="text-caption font-label-bold text-slate-400">RTO Code: 89012</span>
                    <span class="text-caption font-label-bold text-slate-400">CRICOS Provider: 0341B</span>
                </div>
            </div>
        </div>
    </footer>

    <div id="stitch-agent-cursor" data-stitch-injected="" style="left:-40px;top:-40px;">
        <svg class="cursor-pointer" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M5 3l14 8-6.5 2L9 19.5z" fill="#3b82f6" stroke="#1d4ed8" stroke-width="1.2"
                stroke-linejoin="round"></path>
        </svg>
        <svg class="cursor-text" width="20" height="28" viewBox="0 0 20 28" fill="none">
            <path d="M6 2h8M6 26h8M10 2v24" stroke="#3b82f6" stroke-width="2.5" stroke-linecap="round"></path>
        </svg>
        <svg class="cursor-paint" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M18.5 1.5c.8-.8 2.1-.8 2.8 0 .8.8.8 2.1 0 2.8L11 14.5l-3.5 1 1-3.5L18.5 1.5z" fill="#3b82f6"
                stroke="#1d4ed8" stroke-width="1" stroke-linejoin="round"></path>
            <path d="M7 14.5c-2 2-3.5 4-3.5 5.5 0 1.5 1 2.5 2.5 2.5 1.5 0 3.5-1.5 5.5-3.5" stroke="#3b82f6"
                stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M4 20c-.5.5-1.2 1-2 1.2" stroke="#6366f1" stroke-width="1" stroke-linecap="round"></path>
        </svg>
        <span id="stitch-cursor-label">Stitch</span>
    </div>
</body>

</html>
