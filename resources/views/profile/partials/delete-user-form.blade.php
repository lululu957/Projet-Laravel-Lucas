<div class="card">
    <div class="card-header" id="delete_account">
        <h3 class="card-title">
            Delete Account
        </h3>
    </div>
    <div class="card-body flex flex-col lg:py-7.5 lg:gap-7.5 gap-3">
        <div class="flex flex-col gap-5">
            <div class="text-2sm text-gray-800">
                We regret to see you leave. Confirm account deletion below. Your data will be permanently removed. Thank you for being part of our
                community. Please check our
                <a class="link" href="#">
                    Setup Guidelines
                </a>
                if you still wish continue.
            </div>
            <label class="checkbox-group">
                <input class="checkbox checkbox-sm" name="delete" type="checkbox" value="1">
                <span class="checkbox-label">
                Confirm deleting account
               </span>
                </input>
            </label>
        </div>
        <div class="flex justify-end gap-2.5">
            <form action="{{ route('profile.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete Account</button>
            </form>
        </div>
    </div>
</div>

{{--<script>--}}
{{--    document.querySelector('form').addEventListener('submit', function (e) {--}}
{{--        if (!document.querySelector('input[name="delete"]').checked) {--}}
{{--            e.preventDefault();--}}
{{--            alert('Veuillez confirmer la suppression du compte en cochant la case.');--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
