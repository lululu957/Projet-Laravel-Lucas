{{--<tr>--}}
{{--    <td>{{ $student->user->last_name }}</td>--}}
{{--    <td>{{ $student->user->first_name }}</td>--}}
{{--    <td>{{ $student->user->birth_date }}</td>--}}
{{--    <td>{{ $student->user->email }}</td>--}}
{{--    <td>--}}
{{--        <div class="flex items-center justify-between">--}}
{{--            <a class="hover:text-primary cursor-pointer"--}}
{{--               href="#"--}}
{{--               data-modal-toggle="#student-modal"--}}
{{--               data-user='@json($student->user)'--}}
{{--               onclick="openEditModal(this)">--}}
{{--                <i class="ki-filled ki-cursor"></i>--}}
{{--            </a>--}}
{{--            <form action="{{ route('user.destroy', $student->user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">--}}
{{--                @csrf--}}
{{--                @method('DELETE')--}}
{{--                <button type="submit" class="hover:text-danger cursor-pointer bg-transparent border-0">--}}
{{--                    <i class="text-danger ki-filled ki-shield-cross"></i>--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </td>--}}
{{--</tr>--}}
