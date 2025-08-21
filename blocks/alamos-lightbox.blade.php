{{--
Title: Alamos Lightbox
Description:
Category: vdi-blocks
Icon: align-wide
Keywords: section content
Mode: auto
PostTypes: page block-pattern
SupportsAlign: false
SupportsAlignText: false
SupportsAlignContent: false
SupportsMode: true
SupportsMultiple: true
SupportsInnerBlocks: true
FullWith: true
EnqueueStyle:
EnqueueScript:
EnqueueAssets:
--}}
@php
    $img = get_field('image') ?: [];
    $dialogId = 'lightbox-dialog-' . uniqid();
    $imgUrl = $img['url'] ?? '';
    $imgAlt = !empty($img['alt']) ? $img['alt'] : 'Image';
    $imgCaption = $img['caption'] ?? '';
@endphp
<style>
    ::backdrop {
        background-color: rgba(0, 0, 0, 0.7);
    }

    dialog.favDialog {
        width: 95vw;
        max-width: 48rem;
        margin: auto;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 0;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
        padding: 0;
        overflow: hidden;
        transition: transform 0.2s cubic-bezier(.4, 0, .2, 1);
    }

    @media (min-width: 640px) {
        dialog.favDialog {
            width: 80vw;
            padding: 1.5rem;
        }
    }

    @media (min-width: 1024px) {
        dialog.favDialog {
            width: 60vw;
            padding: 2rem;
        }
    }

    .favDialog img {
        width: 100%;
        height: auto;
        max-height: 70vh;
        object-fit: contain;
        border-radius: 0;
        background: #f3f4f6;
    }

    .favDialog .container {
        padding: 2.5rem 0.5rem 0 0.5rem;
    }

    .close {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        background: rgba(255, 255, 255, 0.85);
        border-radius: 9999px;
        border: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: background 0.2s;
        z-index: 10;
    }

    .close:hover,
    .close:focus {
        background: #f3f4f6;
        outline: 2px solid #2563eb;
    }

    @media (prefers-reduced-motion: reduce) {
        dialog {
            transition: none !important;
        }
    }
</style>
<dialog id="{{ $dialogId }}" class="favDialog bg-white" aria-labelledby="{{ $dialogId }}-title"
    aria-describedby="{{ $dialogId }}-desc" role="dialog">
    <form method="dialog" class="relative">
        <button class="close text-xl text-black px-2" aria-label="Close lightbox" formnovalidate>
            <span aria-hidden="true" class="text-2xl">&#215;</span>
            <span class="sr-only">Close</span>
        </button>
        <div class="container mx-auto" role="document">
            <p id="{{ $dialogId }}-desc" class="sr-only">Expanded view of the image. Press ESC key or click outside to
                close.
            </p>
            @if(!empty($imgUrl))
                <img src="{{ $imgUrl }}" alt="{{ $imgAlt }}"
                    class="mt-2 focus:outline-blue-600 focus:outline-2 w-full max-w-[90vw] max-w-screen-2xl mx-auto max-h-[92vh] lg:max-h-[92vh] xl:max-h-[94vh] 2xl:max-h-[96vh]"
                    loading="lazy" decoding="async" tabindex="0" role="img">
            @else
                <div class="bg-gray-200 w-full h-48 flex items-center justify-center">
                    <p>Image not available</p>
                </div>
            @endif
            <p class="text-xs text-right mt-2 mb-0 text-gray-500" id="{{ $dialogId }}-esc-instructions">Press ESC to
                close</p>
        </div>
    </form>
</dialog>

<div class="w-full flex justify-center items-center">
    <button aria-label="Click to expand image: {{ $imgAlt }}"
        class="updateDetails group w-full md:w-auto focus:outline-blue-600 focus:outline-2" aria-expanded="false"
        aria-controls="{{ $dialogId }}" type="button" tabindex="0" role="button">
        @if(!empty($imgUrl))
            <div class="relative w-full container mx-auto">
                <img src="{{ $imgUrl }}" alt="{{ $imgAlt }}"
                    class="shadow-md w-full h-auto max-h-[80vh] transition-transform duration-200 group-hover:scale-105 group-focus:scale-105 focus:outline-blue-600 focus:outline-2"
                    loading="lazy" decoding="async" tabindex="-1" role="img">
                <div class="absolute right-2 bottom-2">
                    <span class="hidden lg:inline-block bg-white/90 text-xs px-2 py-1 shadow text-gray-600">Click to
                        expand</span>
                    <span class="inline-block lg:hidden bg-white/90 text-xs px-2 py-1 shadow text-gray-600">Tap to
                        expand</span>
                </div>
            </div>
        @else
            <div class="bg-gray-200 w-full h-48 flex items-center justify-center">
                <p>Image not available</p>
            </div>
        @endif
    </button>
</div>
<script>
    (() => {
        const updateButtons = document.querySelectorAll(".updateDetails");
        const closeButtons = document.querySelectorAll(".close");
        const dialogs = document.querySelectorAll(".favDialog");

        updateButtons.forEach((updateButton, index) => {
            const dialog = dialogs[index];
            const closeButton = closeButtons[index];

            let lastFocusedElement;

            const trapFocus = (element) => {
                const focusableElements = element.querySelectorAll(
                    'a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), [tabindex]:not([tabindex="-1"])'
                );
                if (!focusableElements.length) return;
                const firstFocusableElement = focusableElements[0];
                const lastFocusableElement = focusableElements[focusableElements.length - 1];
                element.addEventListener('keydown', (e) => {
                    if (e.key === 'Tab') {
                        if (e.shiftKey && document.activeElement === firstFocusableElement) {
                            lastFocusableElement.focus();
                            e.preventDefault();
                        } else if (!e.shiftKey && document.activeElement === lastFocusableElement) {
                            firstFocusableElement.focus();
                            e.preventDefault();
                        }
                    } else if (e.key === 'Escape') {
                        dialog.close();
                        updateButton.setAttribute('aria-expanded', 'false');
                        if (lastFocusedElement) lastFocusedElement.focus();
                    }
                });
            };

            updateButton.addEventListener("click", () => {
                lastFocusedElement = document.activeElement;
                dialog.showModal();
                updateButton.setAttribute('aria-expanded', 'true');
                closeButton.focus();
                const announcer = document.createElement('div');
                announcer.setAttribute('aria-live', 'polite');
                announcer.setAttribute('role', 'status');
                announcer.classList.add('sr-only');
                announcer.textContent = 'Image lightbox opened';
                document.body.appendChild(announcer);
                setTimeout(() => document.body.removeChild(announcer), 1000);
                trapFocus(dialog);
                document.body.style.overflow = 'hidden';
            });

            closeButton.addEventListener("click", () => {
                dialog.close();
                updateButton.setAttribute('aria-expanded', 'false');
                if (lastFocusedElement) lastFocusedElement.focus();
                document.body.style.overflow = '';
            });

            dialog.addEventListener("click", e => {
                const dialogDimensions = dialog.getBoundingClientRect();
                if (
                    e.clientX < dialogDimensions.left ||
                    e.clientX > dialogDimensions.right ||
                    e.clientY < dialogDimensions.top ||
                    e.clientY > dialogDimensions.bottom
                ) {
                    dialog.close();
                    updateButton.setAttribute('aria-expanded', 'false');
                    if (lastFocusedElement) lastFocusedElement.focus();
                    document.body.style.overflow = '';
                }
            });

            dialog.addEventListener("close", () => {
                updateButton.setAttribute('aria-expanded', 'false');
                if (lastFocusedElement) {
                    lastFocusedElement.focus();
                }
                document.body.style.overflow = '';
            });
        });
    })();
</script>
