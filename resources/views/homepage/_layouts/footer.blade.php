<footer id="homepage-footer" class="absolute bottom-0 left-0 right-0 px-24 pt-36 pb-12 flex gap-12 bg-gray-900 bg-cover bg-center text-white" style="background-image: url({{ asset('assets/images/footer-background.png') }})">
    <div class="basis-6/12 space-y-4">
        <span class="block text-xl font-semibold">Ghazwul Shaf</span>
        <p class="text-justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam, nulla aut ut saepe, obcaecati minus porro reprehenderit consequuntur ipsam beatae a possimus facere debitis odio voluptatum eveniet optio! Perspiciatis, reiciendis.Nostrum, nam at alias consectetur inventore exercitationem et velit qui dolor adipisci tempora sunt voluptatem sint quas nemo laboriosam corrupti facere! Qui, vel soluta consequuntur dolor error doloremque assumenda quaerat.</p>
    </div>
    <div class="basis-2/12 space-y-4">
        <span class="block font-semibold">Projects</span>
        <ul class="flex flex-col items-start gap-2">
            <a href="#"><li>Website</li></a>
            <a href="#"><li>Internet of Things</li></a>
            <a href="#"><li>Artificial Intelligence</li></a>
            <a href="#"><li>Others</li></a>
        </ul>
    </div>
    <div class="basis-4/12 space-y-4">
        <span class="block font-semibold">Contact Me</span>
        <ul class="flex w-full items-center gap-4 *:text-4xl">
            <li><i class="fa-brands fa-square-whatsapp"></i></li>
            <li><i class="fa-brands fa-square-instagram"></i></li>
            <li><i class="fa-brands fa-linkedin"></i></li>
            <li><i class="fa-solid fa-square-envelope"></i></li>
        </ul>
    </div>
</footer>

@push('scripts')
<script>
    const footer = document.getElementById('homepage-footer')
    let footerHeight = String(footer.offsetHeight) + "px"

    document.body.style.paddingBottom = footerHeight
</script>
@endpush