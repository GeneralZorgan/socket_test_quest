<div>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Notifications
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body my-3 d-flex justify-content-center">
                    <div class="toast-container">
                        @if(count($notifications) > 0)
                            @foreach($notifications as $notification)
                                <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header">
                                        <strong class="me-auto">Administration</strong>
                                        <small class="text-muted">{{ \Carbon\Carbon::parse($notification->created_at)->format('d.m.y h:m') }}</small>
                                    </div>
                                    <div class="toast-body">{{ $notification->data['message'] }}</div>
                                </div>
                            @endforeach
                        @else
                            <p class="mb-0">Empty</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
