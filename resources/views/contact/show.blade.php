<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="contactModalLabel">Contact Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p><strong>Name:</strong> <span class="text-secondary">{{$contact->name}}</span></p>
            <p><strong>Email:</strong> <span class="text-secondary">{{$contact->email}}</span></p>
            <p><strong>Phone:</strong> <span class="text-secondary">{{$contact->phone_number}}</span></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>