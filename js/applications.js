window.onload = getJobs;

async function getJobs() {
    const response = await fetch('http://localhost/job-portal-server/endpoints/Applications/fetchApplications.php');
    const jobs = await response.json();
    console.log(jobs);
    jobs.forEach(job => {
        $('#all-applications').append(
            `<div class="application-container">
                <a data-toggle="collapse" data-target="#applicants-${job.id}" class="btn btn-block bg-primary">${job.title}-${job.company_name}</a>
                <div class="collapse" id="applicants-${job.id}">
                    <h4>${job.first_name} ${job.last_name}</h4>
                    <span>${job.email}</span><br>
                    <span>${job.phone}</span><br>
                    <span>${job.about}</span><br>
                </div>
            </div><br>`
        )
    });
}