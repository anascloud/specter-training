import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export function initCmsEditors() {
    const wrappers = Array.from(document.querySelectorAll('[data-cms-editor]'));
    if (wrappers.length === 0) return;

    wrappers.forEach(wrapper => {
        const htmlContainer = wrapper.querySelector('[data-html-container]');
        const wysiwygContainer = wrapper.querySelector('[data-wysiwyg-container]');
        const htmlTextarea = wrapper.querySelector('[data-editor-html]');
        const wysiwygTextarea = wrapper.querySelector('[data-editor-wysiwyg]');
        const btnVisual = wrapper.querySelector('[data-editor-mode="visual"]');
        const btnHtml = wrapper.querySelector('[data-editor-mode="html"]');

        if (!htmlTextarea || !wysiwygTextarea || !htmlContainer || !wysiwygContainer || !btnVisual || !btnHtml) {
            return;
        }

        const form = wrapper.closest('form');
        const previewBtn = form ? form.querySelector('[data-preview]') : null;

        const modal = document.getElementById('preview-modal');
        const closeBtn = document.querySelector('[data-close-preview]');
        const previewBody = document.getElementById('preview-body');

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        const uploadUrl = wrapper.getAttribute('data-upload-url') || '';
        const previewUrl = wrapper.getAttribute('data-preview-url') || '';

        let mode = 'visual';
        let editor = null;

        function setActiveButton(active) {
            if (active === 'visual') {
                btnVisual.className = 'rounded-lg bg-brand-500 px-3 py-1.5 text-sm font-medium text-white';
                btnHtml.className = 'rounded-lg border border-gray-200 px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-white/5';
            } else {
                btnHtml.className = 'rounded-lg bg-brand-500 px-3 py-1.5 text-sm font-medium text-white';
                btnVisual.className = 'rounded-lg border border-gray-200 px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-white/5';
            }
        }

        function openPreview(html) {
            if (!modal || !previewBody) return;
            previewBody.innerHTML = html;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closePreview() {
            if (!modal) return;
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        async function getContentForActions() {
            if (mode === 'visual' && editor) {
                return editor.getData();
            }
            return htmlTextarea.value || '';
        }

        function switchMode(nextMode) {
            if (nextMode === mode) return;

            if (nextMode === 'html') {
                if (editor) {
                    htmlTextarea.value = editor.getData();
                }
                wysiwygContainer.classList.add('hidden');
                htmlContainer.classList.remove('hidden');
                mode = 'html';
                setActiveButton('html');
                return;
            }

            wysiwygContainer.classList.remove('hidden');
            htmlContainer.classList.add('hidden');
            mode = 'visual';
            setActiveButton('visual');
            if (editor) {
                editor.setData(htmlTextarea.value || '');
            }
        }

        setActiveButton('visual');

        ClassicEditor.create(wysiwygTextarea, {
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                '|',
                'insertTable',
                'imageUpload',
                'blockQuote',
                '|',
                'undo',
                'redo',
            ],
            link: {
                defaultProtocol: 'https://',
            },
            simpleUpload: uploadUrl
                ? {
                      uploadUrl,
                      headers: {
                          'X-CSRF-TOKEN': csrfToken,
                      },
                  }
                : undefined,
        })
            .then(instance => {
                editor = instance;
            })
            .catch(() => {
                switchMode('html');
            });

        btnVisual.addEventListener('click', () => switchMode('visual'));
        btnHtml.addEventListener('click', () => switchMode('html'));

        if (closeBtn) {
            closeBtn.addEventListener('click', closePreview);
        }
        if (modal) {
            modal.addEventListener('click', e => {
                if (e.target === modal) closePreview();
            });
        }

        if (previewBtn && previewUrl) {
            previewBtn.addEventListener('click', async () => {
                const content = await getContentForActions();
                const res = await fetch(previewUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        Accept: 'application/json',
                    },
                    body: JSON.stringify({ content }),
                });
                const data = await res.json();
                openPreview(data.html || '');
            });
        }

        if (form) {
            form.addEventListener('submit', () => {
                if (mode === 'visual' && editor) {
                    htmlTextarea.value = editor.getData();
                }
            });
        }
    });
}

