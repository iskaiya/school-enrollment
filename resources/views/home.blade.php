@extends('common.main')
@section('title','Home')
@section('content')

<div class="home-wrap">

    <div class="welcome-bar">
        <div>
            <p class="welcome-label">Welcome back,</p>
            <h1 class="welcome-name">{{ auth()->user()->name }}</h1>
        </div>
    </div>

    <div class="tabs-container">
        <div class="tabs-nav">
            <button class="tab-btn active" data-tab="announcements"><i class="bi bi-bell"></i>
                Announcements
            </button>
            <button class="tab-btn" data-tab="enrollment">
                <i class="bi bi-file-earmark-text"></i>
                Enrollment
            </button>
            <button class="tab-btn" data-tab="schedule">
                <i class="bi bi-clipboard"></i>
                Schedule
            </button>
        </div>

        <div class="tabs-content">

            {{-- ANNOUNCEMENTS --}}
            <div class="tab-pane active" id="announcements">
                <div class="announcements-list">

                    <div class="announcement-card urgent">
                        <div class="ann-header">
                            <span class="ann-tag urgent-tag">Urgent</span>
                            <span class="ann-date">June 20, 2026</span>
                        </div>
                        <h3 class="ann-title">Enrollment Deadline Extended to June 30</h3>
                        <p class="ann-body">Due to high traffic on the enrollment portal, the Office of the Registrar has extended the enrollment deadline to June 30, 2026. Students who have not yet submitted their enrollment are advised to do so immediately.</p>
                        <span class="ann-from">— Office of the Registrar</span>
                    </div>

                    <div class="announcement-card">
                        <div class="ann-header">
                            <span class="ann-tag info-tag">Reminder</span>
                            <span class="ann-date">June 15, 2026</span>
                        </div>
                        <h3 class="ann-title">Submission of Assessment Fees</h3>
                        <p class="ann-body">Students are reminded to settle their assessment fees at the Cashier's Office before their enrollment can be fully processed. Bring your enrollment form and a valid school ID.</p>
                        <span class="ann-from">— Finance Office</span>
                    </div>

                    <div class="announcement-card">
                        <div class="ann-header">
                            <span class="ann-tag general-tag">General</span>
                            <span class="ann-date">June 10, 2026</span>
                        </div>
                        <h3 class="ann-title">Welcome to the Online Enrollment Portal</h3>
                        <p class="ann-body">The university is pleased to launch its new online enrollment system for A.Y. 2026–2027. For concerns or technical issues, please contact the Registrar's Office at registrar@school.edu.</p>
                        <span class="ann-from">— Office of the Registrar</span>
                    </div>

                </div>
            </div>

            {{-- ENROLLMENT --}}
            <div class="tab-pane" id="enrollment">
                <div class="enrollment-cta">
                    <div class="enroll-icon">
                        <i class="bi bi-file-earmark-text" style="font-size: 40px; color: #b0c9dc;"></i>
                    </div>
                    <h3>Enrollment is now open</h3>
                    <p>Select your subjects and preferred schedule for the First Semester A.Y. 2026–2027. Make sure to submit before the deadline on <strong>June 30, 2026</strong>.</p>
                    <a href="{{ route('enrollment.index') }}" class="enroll-btn">Enroll Now</a>
                </div>
            </div>

            {{-- SCHEDULE --}}
            <div class="tab-pane" id="schedule">
                @if (!$enrollmentStatus)
                    <div class="empty-state">
                        <i class="bi bi-clipboard" style="font-size: 40px; color: #b0c9dc;"></i>
                        <p>No enrollment record found. Go to the Enrollment tab to submit.</p>
                    </div>

                @elseif ($enrollmentStatus === 'pending')
                    <div class="status-banner status-banner--pending">
                        <span class="status-badge status-badge--pending">⏳ Pending</span>
                        <div>
                            <p class="banner-title">Your enrollment is under review.</p>
                            <p class="banner-sub">Your schedule will appear here once the registrar approves your enrollment.</p>
                        </div>
                    </div>

                @elseif ($enrollmentStatus === 'rejected')
                    <div class="status-banner status-banner--rejected">
                        <span class="status-badge status-badge--rejected">✗ Rejected</span>
                        <div>
                            <p class="banner-title">Your enrollment was not approved.</p>
                            <p class="banner-sub">Please visit the Registrar's Office for assistance.</p>
                        </div>
                    </div>

                @else
                    <div class="status-banner status-banner--approved">
                        <span class="status-badge status-badge--approved">✓ Approved</span>
                        <div>
                            <p class="banner-title">Your enrollment has been approved.</p>
                            <p class="banner-sub">Below is your official schedule for this semester.</p>
                        </div>
                    </div>

                    @if ($subjects->isEmpty())
                        <p class="no-subjects">No subjects found. Please contact your adviser.</p>
                    @else
                        <div class="table-wrapper">
                            <table class="subjects-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course Code</th>
                                        <th>Course Name</th>
                                        <th>Section</th>
                                        <th>Units</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                        <th>Professor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subjects as $index => $subject)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><strong>{{ $subject->course_code }}</strong></td>
                                        <td>{{ $subject->course_name }}</td>
                                        <td>{{ $subject->section_code }}</td>
                                        <td>{{ $subject->units }}</td>
                                        <td>{{ $subject->day_schedule }}</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($subject->start_time)->format('g:i A') }} –
                                            {{ \Carbon\Carbon::parse($subject->end_time)->format('g:i A') }}
                                        </td>
                                        <td>{{ $subject->professor }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="total-label">Total Units</td>
                                        <td colspan="4" class="total-value">{{ $subjects->sum('units') }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="print-row">
                            <button onclick="window.print()" class="btn-print">
                                <i class="bi bi-printer"></i> Print Schedule
                            </button>
                        </div>
                    @endif
                @endif
            </div>

        </div>
    </div>
</div>

<style>
    .home-wrap {
        max-width: 860px;
        margin: 0 auto;
        padding: 2.5rem 1.5rem;
        font-family: 'Trebuchet MS', Arial, sans-serif;
    }

    .welcome-bar {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #e8f0f7;
    }

    .welcome-label {
        font-size: 13px;
        color: #7a9bb5;
        margin: 0 0 4px;
        text-transform: uppercase;
        letter-spacing: 0.06em;
    }

    .welcome-name {
        font-size: 26px;
        font-weight: 600;
        color: #007dc4;
        margin: 0;
    }

    .welcome-meta {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .meta-pill {
        background: #eef6fb;
        color: #007dc4;
        font-size: 12px;
        font-weight: 500;
        padding: 4px 12px;
        border-radius: 20px;
        border: 1px solid #c8e2f2;
    }

    .tabs-nav {
        display: flex;
        gap: 4px;
        border-bottom: 2px solid #e8f0f7;
        margin-bottom: 1.5rem;
    }

    .tab-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 0.75rem 1.25rem;
        background: none;
        border: none;
        outline: none;
        font-size: 14px;
        font-weight: 500;
        font-family: 'Trebuchet MS', Arial, sans-serif;
        color: #7a9bb5;
        cursor: pointer;
        border-bottom: 2px solid transparent;
        margin-bottom: -2px;
        transition: all 0.2s ease;
    }

    .tab-btn:hover {
        color: #007dc4;
    }

    .tab-btn.active {
        color: #007dc4;
        border-bottom: 2px solid #007dc4;
    }

    .tab-pane {
        display: none;
    }

    .tab-pane.active {
        display: block;
    }

    /* Announcements */
    .announcements-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .announcement-card {
        background: #ffffff;
        border: 1px solid #e8f0f7;
        border-left: 4px solid #007dc4;
        border-radius: 10px;
        padding: 1.25rem 1.5rem;
    }

    .announcement-card.urgent {
        border-left-color: #e74c3c;
        background: #fffafa;
    }

    .ann-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 8px;
    }

    .ann-tag {
        font-size: 11px;
        font-weight: 600;
        padding: 2px 10px;
        border-radius: 20px;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .urgent-tag {
        background: #fdecea;
        color: #c0392b;
    }

    .info-tag {
        background: #eef6fb;
        color: #007dc4;
    }

    .general-tag {
        background: #f0f7f0;
        color: #27ae60;
    }

    .ann-date {
        font-size: 12px;
        color: #a0b8cc;
        margin-left: auto;
    }

    .ann-title {
        font-size: 15px;
        font-weight: 600;
        color: #1a3a4a;
        margin: 0 0 6px;
    }

    .ann-body {
        font-size: 13px;
        color: #5a7a8a;
        line-height: 1.6;
        margin: 0 0 10px;
    }

    .ann-from {
        font-size: 12px;
        color: #a0b8cc;
        font-style: italic;
    }

    /* Enrollment */
    .enrollment-cta {
        text-align: center;
        padding: 3rem 2rem;
        background: #f7fbfe;
        border: 1px dashed #b8d8ee;
        border-radius: 12px;
    }

    .enroll-icon {
        margin-bottom: 1rem;
    }

    .enrollment-cta h3 {
        font-size: 18px;
        color: #007dc4;
        margin: 0 0 8px;
    }

    .enrollment-cta p {
        font-size: 14px;
        color: #5a7a8a;
        margin: 0 0 1.5rem;
        line-height: 1.6;
    }

    .enroll-btn {
        display: inline-flex;
        align-items: center;
        padding: 0.6rem 2rem;
        background: #007dc4;
        color: #ffffff;
        border-radius: 25px;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        transition: background 0.2s ease;
    }

    .enroll-btn:hover {
        background: #005f9e;
        color: #ffffff;
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
        color: #a0b8cc;
    }

    .empty-state p {
        margin-top: 1rem;
        font-size: 14px;
        color: #a0b8cc;
    }

    .status-banner {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    padding: 14px 18px;
    border-radius: 10px;
    margin-bottom: 1.5rem;
    font-size: 14px;
}
.status-banner--pending  { background: #fff8e1; border: 1px solid #ffe082; }
.status-banner--rejected { background: #fce4ec; border: 1px solid #f48fb1; }
.status-banner--approved { background: #e8f5e9; border: 1px solid #a5d6a7; }

.status-badge {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
    margin-top: 2px;
}
.status-badge--pending  { background: #ffe082; color: #5d4037; }
.status-badge--rejected { background: #ef9a9a; color: #b71c1c; }
.status-badge--approved { background: #a5d6a7; color: #1b5e20; }

.banner-title { margin: 0 0 4px; font-weight: 600; color: #333; }
.banner-sub   { margin: 0; color: #666; font-size: 13px; }

.no-subjects  { color: #888; font-size: 14px; margin-top: 1rem; }

.table-wrapper { overflow-x: auto; margin-top: 1rem; }
.subjects-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
}
.subjects-table th,
.subjects-table td {
    padding: 10px 12px;
    text-align: left;
    border-bottom: 1px solid #e8f0f7;
}
.subjects-table thead tr { background: #eef6fb; }
.subjects-table thead th {
    color: #007dc4;
    font-weight: 600;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.4px;
}
.subjects-table tbody tr:hover { background: #f7fbfe; }
.subjects-table tfoot td { border-top: 2px solid #007dc4; padding-top: 12px; }
.total-label { font-weight: 600; color: #333; text-align: right; }
.total-value { font-weight: 700; color: #007dc4; font-size: 15px; }

.print-row { margin-top: 1.5rem; text-align: right; }
.btn-print {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 20px;
    background: #007dc4;
    color: #fff;
    border: none;
    border-radius: 25px;
    font-size: 13px;
    cursor: pointer;
    transition: background 0.2s ease;
}
.btn-print:hover { background: #005f9e; }

@media print {
    .btn-print, .tabs-nav, #main-header { display: none; }
    .tab-pane { display: block !important; }
}
</style>

<script>
    document.querySelectorAll('.tab-btn').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('active'));
            button.classList.add('active');
            document.getElementById(button.dataset.tab).classList.add('active');
        });
    });
</script>

@endsection