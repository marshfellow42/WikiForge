import './bootstrap';

import Alpine from 'alpinejs';

import '@toast-ui/editor/dist/toastui-editor.css'; // Default theme
import '@toast-ui/editor/dist/theme/toastui-editor-dark.css'; // Dark theme
import { Editor } from '@toast-ui/editor';

window.Alpine = Alpine;

Alpine.start();

let editor; // Declare editor in a higher scope

document.addEventListener("DOMContentLoaded", function() {
    editor = new Editor({
        el: document.querySelector("#editor"),
        usageStatistics: false,
        height: "400px",
        initialEditType: "markdown",
        previewStyle: "vertical",
        theme: "dark",
        hooks: {
            addImageBlobHook: async (blob, callback) => {
                try {
                    const formData = new FormData();
                    formData.append("image", blob);

                    const response = await fetch("/upload-image", {
                        method: "POST",
                        body: formData,
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                        }
                    });

                    const result = await response.json();
                    if (result.url) {
                        callback(result.url, "Uploaded Image");
                    } else {
                        alert("Image upload failed.");
                    }
                } catch (error) {
                    console.error("Upload error:", error);
                    alert("Image upload error.");
                }
            }
        }
    });

    function updateContentField() {
        let markdownContent = editor.getMarkdown();
        console.log("Editor Content:", markdownContent); // Debugging
        document.querySelector("#content").value = markdownContent;
    }

    // Update `content` field on submit
    document.querySelector("form").addEventListener("submit", function() {
        updateContentField();
    });

    // Optional: Update `content` field on input change
    editor.on("change", function() {
        updateContentField();
    });
});
