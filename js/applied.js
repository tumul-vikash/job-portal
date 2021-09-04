window.onload = getJobs;

async function getJobs() {
    const response = await fetch('http://localhost/job-portal-server/endpoints/Applications/fetchAppliedJobs.php');
    const jobs = await response.json();
    console.log(jobs);
    jobs.forEach(job => {
        var jobContainer = document.createElement("DIV");
        jobContainer.classList.add("job-container");
        
        var title = document.createElement("H3");
        title.classList.add("text-primary");
        title.innerHTML = job.title;
        jobContainer.appendChild(title);

        var companyName = document.createElement("SPAN");
        companyName.innerHTML = job.company_name;
        jobContainer.appendChild(companyName);
        
        var extraData = document.createElement("DIV");
        extraData.classList.add("d-flex", "row", "justify-content-around", "extra-data");
        var author = document.createElement("P");
        author.innerHTML = job.author;
        var createdAt =  document.createElement("p");
        createdAt.innerHTML = job.created_at;
        extraData.appendChild(author);
        extraData.appendChild(createdAt);
        jobContainer.appendChild(extraData);

        var jd = document.createElement("P");
        jd.innerHTML = job.job_description;
        jobContainer.appendChild(jd);

        document.getElementById('all-jobs').appendChild(jobContainer);
    });
}