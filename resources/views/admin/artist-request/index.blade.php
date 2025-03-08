@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Artist Request</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Document</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($artistRequests as $artist)
                                    <tr>
                                        <td>{{ $artist->name }}</td>
                                        <td class="text-secondary">
                                            {{ $artist->email }}
                                        </td>
                                        <td class="text-secondary">
                                            @if ($artist->approve_status === 'pending')
                                                <span class="badge bg-yellow text-yellow-fg">
                                                    {{ $artist->approve_status }}
                                                </span>
                                            @elseif ($artist->approve_status === 'rejected')
                                                <span class="badge bg-red text-red-fg">
                                                    {{ $artist->approve_status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.artist-doc-download', $artist->id) }}"
                                                class="text-muted">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-download">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                    <path d="M7 11l5 5l5 -5" />
                                                    <path d="M12 4l0 12" />
                                                </svg>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.artist-request.update', $artist->id) }}"
                                                method="POST" class="status-{{ $artist->id }}">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="form-control"
                                                    onchange="$('.status-{{ $artist->id }}').submit()">
                                                    <option @selected($artist->approve_status === 'pending') value="pending">Pending</option>
                                                    <option @selected($artist->approve_status === 'approved') value="approved">Approve</option>
                                                    <option @selected($artist->approve_status === 'rejected') value="rejected">reject</option>
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No Data Available!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
