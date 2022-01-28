<section class="footer-container ">


    <div class="footer-support ">
        if you have any problem ? you can contact with our support team
        <button class="custom-btn btn-7  mx-2  ">

            <span class="btn-7-span">

                <a href="#" data-toggle="modal" data-target="#support">
                    <i class="icon-deal"></i>
                    <p style="display: inline-block;margin-top: revert;" class="pt-1 text-dark">
                        Support Team
                    </p>
                </a>

            </span>

        </button>
    </div>

    <div class="footer-copytight">

        © 2021, eBid.com, contact-us : eBid@ebid.ebid

    </div>



</section>





<div class="modal fade" id="support" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Support Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('support.store') }}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control w-100" id="message" name="message" rows="3"></textarea>
                        </div>
                        <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>

                </form>
            </div>
        </div>
    </div>
</div>
