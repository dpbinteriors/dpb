<!-- Modal toggle -->
<!-- Main Modal -->
<div id="generic-modal" class="modal" tabindex="-1" aria-hidden="false">
    <div class="modal-wrapper">
        <!-- Modal content -->
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <h1 class="modal-title">Thank You for Getting in Touch</h1>
                <p>We will get back to you as soon as possible.</p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button class="modal-button" onclick="document.getElementById('generic-modal').style.display = 'none'">Continue to Site</button>
            </div>
        </div>
    </div>
</div>

<style>
    .modal {
        position: fixed;
        inset: 0;
        z-index: 50;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-wrapper {
        position: relative;
        width: 100%;
        max-width: 640px;
        padding: 16px;
        transform: translateY(-50%);
        top: 50%;
    }

    .modal-content {
        background: white;
        border-radius: 8px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        padding: 36px 24px;
        text-align: center;
    }

    .modal-title {
        color: #60a5fa;
        font-size: 1.5rem;
        margin-bottom: 12px;
    }

    .modal-body p {
        font-size: 1rem;
        color: #333;
    }

    .modal-footer {
        margin-top: 35px;
        display: flex;
        justify-content: center;
    }

    .modal-button {
        padding: 14px 24px;
        border: none;
        background-color: #e5e7eb;
        cursor: pointer;
        border-radius: 6px;
        font-weight: 500;
    }

    .modal-button:hover {
        background-color: #d1d5db;
    }
</style>
