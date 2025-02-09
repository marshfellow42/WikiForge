import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import '@toast-ui/editor/dist/toastui-editor.css'; // Default theme
import '@toast-ui/editor/dist/theme/toastui-editor-dark.css'; // Dark theme
import { Editor } from '@toast-ui/editor';

document.addEventListener("DOMContentLoaded", function() {
    const editor = new Editor({
        el: document.querySelector("#editor"),
        height: "400px",
        initialEditType: "markdown",
        previewStyle: "vertical",
        theme: "dark" // Enable dark mode
    });

    document.querySelector("form").addEventListener("submit", function() {
        document.querySelector("#content").value = editor.getMarkdown();
    });
});
