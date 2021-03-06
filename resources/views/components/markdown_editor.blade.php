<div>
    <textarea x-data="editor({{$content}}, `{{$previewUrl}}`)" name="content" x-init="init()" x-ref="textarea"></textarea>
</div>
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script>
    function editor(content, previewUrl) {
        return {
            init() {
                let mde = new SimpleMDE({
                    element: this.$refs.textarea,
                    spellChecker: false,
                    status: false,
                    hideIcons: ["guide", "heading"],
                    initialValue: content,
                    insertTexts: {
                        image: ["![](", ")"],
                        link: ["[", "]()"],
                    },
                    renderingConfig: {
                        markedOptions: {
                            sanitize: true
                        }
                    },
                    previewRender: function(plainText, preview) {
                        let token = document.querySelector('meta[name="csrf-token"]')
                        fetch(previewUrl, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': token.content
                                },
                                body: JSON.stringify({
                                    content: plainText
                                })
                            })
                            .then(response => response.text())
                            .then(data => {
                                preview.innerHTML = null;
                                const iframe = document.createElement("iframe")
                                iframe.style.width = "100%";
                                iframe.style.height = "100%";
                                preview.appendChild(iframe);
                                iframe.contentWindow.document.open();
                                iframe.contentWindow.document.write(data);
                                iframe.contentWindow.document.close();
                            });

                        return 'loading...';
                    },
                    toolbar: [{
                            name: "bold",
                            action: SimpleMDE.toggleBold,
                            className: "fa fa-bold",
                            title: "Bold",
                        },
                        {
                            name: "italic",
                            action: SimpleMDE.toggleItalic,
                            className: "fa fa-italic",
                            title: "Italic",
                        },
                        '|',
                        {
                            name: "quote",
                            action: SimpleMDE.toggleBlockquote,
                            className: "fa fa-quote-left",
                            title: "Quote",
                        },
                        {
                            name: "unordered-list",
                            action: SimpleMDE.toggleUnorderedList,
                            className: "fa fa-list-ul",
                            title: "Generic List",
                        },
                        {
                            name: "ordered-list",
                            action: SimpleMDE.toggleOrderedList,
                            className: "fa fa-list-ol",
                            title: "Numbered List",
                        },
                        "|",
                        {
                            name: "link",
                            action: SimpleMDE.drawLink,
                            className: "fa fa-link",
                            title: "Link",
                        },
                        {
                            name: "image",
                            action: SimpleMDE.drawImage,
                            className: "fa fa-image",
                            title: "Image",
                        },
                        "|",
                        {
                            name: "preview",
                            action: SimpleMDE.togglePreview,
                            className: "fa fa-eye no-disable",
                            title: "Preview",
                        }
                    ]
                });
            }
        }
    }
</script>