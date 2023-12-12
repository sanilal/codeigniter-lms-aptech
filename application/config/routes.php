<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'home/page_not_found';
$route['certificate/(:any)']        = "addons/certificate/generate_certificate/$1";

//course bundles
$route['course_bundles/(:any)']                                = "addons/course_bundles/index/$1";
$route['course_bundles']                                    = "addons/course_bundles";
$route['course_bundles/search/(:any)']                        = "addons/course_bundles/search/$1";
$route['course_bundles/search/(:any)/(:any)']                = "addons/course_bundles/search/$1/$1";
$route['bundle_details/(:any)/(:any)']                      = "addons/course_bundles/bundle_details/$1";
$route['bundle_details/(:any)']                              = "addons/course_bundles/bundle_details/$1/$1";
$route['course_bundles/buy/(:any)']                          = "addons/course_bundles/buy/$1";
$route['home/my_bundles']                                      = "addons/course_bundles/my_bundles";
$route['home/bundle_invoice/(:any)']                          = "addons/course_bundles/invoice/$1";
//end course bundles

//ebook
$route['ebook/ebook_details/(:any)/(:any)'] = "addons/ebook/ebook_details/$1/$2";
$route['ebook'] = "addons/ebook/ebooks";
$route['ebook_manager/all_ebooks'] = "addons/ebook_manager/all_ebooks";
$route['ebook_manager/add_ebook'] = "addons/ebook_manager/add_ebook";
$route['ebook_manager/payment_history'] = "addons/ebook_manager/payment_history";
$route['ebook_manager/category'] = "addons/ebook_manager/category";
$route['ebook/buy/(:any)'] = "addons/ebook/buy/$1";
$route['home/my_ebooks'] = "addons/ebook/my_ebooks";
//end ebook

//BLog
$route['blogs'] = "blog/blogs";
$route['blogs/(:any)'] = "blog/blogs/$1";
//End blog

//pages
$route['blogs'] = "page/pages";
$route['blogs/(:any)'] = "page/pages/$1";
//End blog

// $route['about-aptech'] = "page/details/about-aptech/1";
$route['about-aptech'] = "home/about_us";
$route['multimedia-courses/summer-courses-whizkid-wonder-teens'] = "home/whizkid";

//BLog
$route['contact-us'] = "home/contact";

//BLog
// $route['blogs'] = "blog/blogs";
// $route['blogs/(:any)'] = "blog/blogs/$1";
//End blog

$route['translate_uri_dashes'] = FALSE;


//Candidate Routes (outer)
// $route['login'] = 'candidates/loginView';
// $route['post-login'] = 'candidates/login';
// $route['logout'] = 'candidates/logout';
// $route['register'] = 'candidates/registerView';
// $route['post-register'] = 'candidates/register';
// $route['forgot-password'] = 'candidates/showForgotPassword';
// $route['send-password-link'] = 'candidates/sendPasswordLink';
// $route['reset-password/(:any)'] = 'candidates/resetPassword/$1';
// $route['reset-password'] = 'candidates/updatePasswordByForgot';
// $route['activate-account/(:any)'] = 'candidates/activateAccount/$1';
// $route['google-redirect'] = 'candidates/googleRedirect';
// $route['linkedin-redirect'] = 'candidates/linkedinRedirect';
// $route['admin-login/(:any)/(:any)'] = 'candidates/adminLogin/$1/$2';

//Candidate Routes (inner)
// $route['account/profile'] = 'candidates/updateProfileView';
// $route['profile-update'] = 'candidates/updateProfile';
// $route['account/password'] = 'candidates/updatePasswordView';
// $route['password-update'] = 'candidates/updatePassword';

//Account area Candidate Resumes Routes (inner)
$route['candidate'] = 'resumes/listing';
$route['create-resume'] = 'resumes/create';
$route['candidate/resume/(:any)'] = 'resumes/detailView/$1';
$route['candidate/resume-save-general'] = 'resumes/updateGeneral';
$route['candidate/resume-save-experience'] = 'resumes/updateExperience';
$route['candidate/resume-save-qualification'] = 'resumes/updateQualification';
$route['candidate/resume-save-language'] = 'resumes/updateLanguage';
$route['candidate/resume-save-achievement'] = 'resumes/updateAchievement';
$route['candidate/resume-save-reference'] = 'resumes/updateReference';
$route['candidate/resume-add-section/(:any)/(:any)'] = 'resumes/addSection/$1/$2';
$route['candidate/resume-remove-section/(:any)/(:any)'] = 'resumes/removeSection/$1/$2';
$route['candidate/resume-update-doc'] = 'resumes/updateDocResume';

//Account ares job routes
$route['candidate/job-applications'] = 'jobs/jobApplicationsView';
$route['candidate/job-applications/(:any)'] = 'jobs/jobApplicationsView/$1';
$route['candidate/job-favorites'] = 'jobs/jobFavoritesView';
$route['candidate/job-favorites/(:any)'] = 'jobs/jobFavoritesView/$1';
$route['candidate/job-referred'] = 'jobs/jobReferredView';
$route['candidate/job-referred/(:any)'] = 'jobs/jobReferredView/$1';

//Account Area Quizes routes
$route['candidate/quizes'] = 'quizes/listView';
$route['candidate/quizes/(:any)'] = 'quizes/listView/$1';
$route['candidate/quiz/(:any)'] = 'quizes/attemptView/$1';
$route['candidate/quiz-attempt'] = 'quizes/attempt';

//Front end routes
$route['jobs'] = 'jobs/listing';
$route['jobs/(:any)'] = 'jobs/listing/$1';
$route['job/(:any)'] = 'jobs/detail/$1';
$route['mark-favorite/(:any)'] = 'jobs/markFavorite/$1';
$route['unmark-favorite/(:any)'] = 'jobs/unmarkFavorite/$1';
$route['refer-job-view'] = 'jobs/referJobView';
$route['refer-job'] = 'jobs/referJob';
$route['apply-job'] = 'jobs/applyJob';
// $route['blogs'] = 'pages/blogListing';
// $route['blogs/(:any)'] = 'pages/blogListing/$1';
// $route['blog/(:any)'] = 'pages/blogDetail/$1';


//Admin Candidates module routes
$route['admin/candidates'] = 'admin/candidatesListView';
$route['admin/candidates/data'] = 'admin/candidatesData';
$route['admin/candidates/create-or-edit'] = 'admin/candidatesCreateOrEdit';
$route['admin/candidates/create-or-edit/(:any)'] = 'admin/candidatesCreateOrEdit/$1';
$route['admin/candidates/save'] = 'admin/candidatesSaveCandidate';
$route['admin/candidates/status/(:any)/(:any)'] = 'admin/candidatesChangeStatus/$1/$2';
$route['admin/candidates/bulk-action'] = 'admin/candidatesBulkAction';
$route['admin/candidates/delete/(:any)'] = 'admin/candidatesDelete/$1';
$route['admin/candidates/resume/(:any)'] = 'admin/candidatesResume/$1';
$route['admin/candidates/resume-download'] = 'admin/candidatesResumeDownload';
$route['admin/candidates/excel'] = 'admin/candidatesCandidatesExcel';
$route['admin/candidates/message-view'] = 'admin/CandidateInterviewsMessageView';
$route['admin/candidates/message'] = 'admin/CandidateInterviewsMessage';

//Admin Jobs module routes
$route['admin/jobs'] = 'admin/jobslistView';
$route['admin/jobs/data'] = 'admin/jobsData';
$route['admin/jobs/create-or-edit'] = 'admin/jobsCreateOrEdit/$1';
$route['admin/jobs/create-or-edit/(:any)'] = 'admin/jobsCreateOrEdit/$1';
$route['admin/jobs/save'] = 'admin/jobsSave';
$route['admin/jobs/status/(:any)/(:any)'] = 'admin/jobsChangeStatus/$1/$2';
$route['admin/jobs/bulk-action'] = 'admin/jobsBulkAction';
$route['admin/jobs/delete/(:any)'] = 'admin/jobsDelete/$1';
$route['admin/jobs/excel'] = 'admin/jobsExcel';
$route['admin/jobs/add-custom-field'] = 'admin/jobsAddCustomField';
$route['admin/jobs/remove-custom-field/(:any)'] = 'admin/jobsRemoveCustomField/$1';

//Admin job filter module routes
$route['admin/job-filters'] = 'admin/JobFiltersListView';
$route['admin/job-filters/data'] = 'admin/JobFiltersData';
$route['admin/job-filters/create-or-edit'] = 'admin/JobFiltersCreateOrEdit/$1';
$route['admin/job-filters/create-or-edit/(:any)'] = 'admin/JobFiltersCreateOrEdit/$1';
$route['admin/job-filters/save'] = 'admin/JobFiltersSave';
$route['admin/job-filters/update-values/(:any)'] = 'admin/JobFiltersUpdateValuesForm/$1';
$route['admin/job-filters/update-values'] = 'admin/JobFiltersUpdateValues';
$route['admin/job-filters/new-value'] = 'admin/JobFiltersNewValue';
$route['admin/job-filters/status/(:any)/(:any)'] = 'admin/JobFiltersChangeStatus/$1/$2';
$route['admin/job-filters/bulk-action'] = 'admin/JobFiltersBulkAction';
$route['admin/job-filters/delete/(:any)'] = 'admin/JobFiltersDelete/$1';

//Admin Companies module routes
// $route['admin/companies'] = 'admin/companyListView';
// $route['admin/companies/data'] = 'admin/companyData';
// $route['admin/companies/create-or-edit'] = 'admin/companyCreateOrEdit/$1';
// $route['admin/companies/create-or-edit/(:any)'] = 'admin/companyCreateOrEdit/$1';
// $route['admin/companies/save'] = 'admin/companySave';
// $route['admin/companies/status/(:any)/(:any)'] = 'admin/companyChangeStatus/$1/$2';
// $route['admin/companies/bulk-action'] = 'admin/companyBulkAction';
// $route['admin/companies/delete/(:any)'] = 'admin/companyDelete/$1';

//Admin Languages module routes
$route['admin/languages'] = 'admin/languages/listView';
$route['admin/languages/data'] = 'admin/languages/data';
$route['admin/languages/create'] = 'admin/languages/create';
$route['admin/languages/edit/(:any)'] = 'admin/languages/edit/$1';
$route['admin/languages/save'] = 'admin/languages/save';
$route['admin/languages/update'] = 'admin/languages/update';
$route['admin/languages/status/(:any)/(:any)'] = 'admin/languages/changeStatus/$1/$2';
$route['admin/languages/selected/(:any)'] = 'admin/languages/changeSelected/$1';
$route['admin/languages/bulk-action'] = 'admin/languages/bulkAction';
$route['admin/languages/delete/(:any)'] = 'admin/languages/delete/$1';

//Admin Traits module routes
$route['admin/traits'] = 'admin/traitsListView';
$route['admin/traits/data'] = 'admin/traitsData';
$route['admin/traits/create-or-edit'] = 'admin/traitsCreateOrEdit/$1';
$route['admin/traits/create-or-edit/(:any)'] = 'admin/traitsCreateOrEdit/$1';
$route['admin/traits/save'] = 'admin/traitsSave';
$route['admin/traits/status/(:any)/(:any)'] = 'admin/traitsChangeStatus/$1/$2';
$route['admin/traits/bulk-action'] = 'admin/traitsBulkAction';
$route['admin/traits/delete/(:any)'] = 'admin/traitsDelete/$1';

//Admin Departments module routes
$route['admin/departments'] = 'admin/departmentListView';
$route['admin/departments/data'] = 'admin/departmentData';
$route['admin/departments/create-or-edit'] = 'admin/departmentCreateOrEdit/$1';
$route['admin/departments/create-or-edit/(:any)'] = 'admin/departmentCreateOrEdit/$1';
$route['admin/departments/save'] = 'admin/departmentSave';
$route['admin/departments/status/(:any)/(:any)'] = 'admin/departmentChangeStatus/$1/$2';
$route['admin/departments/bulk-action'] = 'admin/departmentBulkAction';
$route['admin/departments/delete/(:any)'] = 'admin/departmentDelete/$1';

//Admin Question Categories module routes
// $route['admin/question-categories'] = 'admin/QuestionCategories/listView';
// $route['admin/question-categories/data'] = 'admin/QuestionCategories/data';
// $route['admin/question-categories/create-or-edit'] = 'admin/QuestionCategories/createOrEdit/$1';
// $route['admin/question-categories/create-or-edit/(:any)'] = 'admin/QuestionCategories/createOrEdit/$1';
// $route['admin/question-categories/save'] = 'admin/QuestionCategories/save';
// $route['admin/question-categories/status/(:any)/(:any)'] = 'admin/QuestionCategories/changeStatus/$1/$2';
// $route['admin/question-categories/bulk-action'] = 'admin/QuestionCategories/bulkAction';
// $route['admin/question-categories/delete/(:any)'] = 'admin/QuestionCategories/delete/$1';

//Admin Questions Bank routes
// $route['admin/questions/create-or-edit'] = 'admin/questions/createOrEdit/$1';
// $route['admin/questions/create-or-edit/(:any)'] = 'admin/questions/createOrEdit/$1';
// $route['admin/questions/create-or-edit/(:any)/(:any)'] = 'admin/questions/createOrEdit/$1/$2';
// $route['admin/questions/save'] = 'admin/questions/save';
// $route['admin/questions/delete/(:any)'] = 'admin/questions/delete/$1';
// $route['admin/questions/add-answer/(:any)'] = 'admin/questions/addAnswer/$1';
// $route['admin/questions/add-answer/(:any)/(:any)'] = 'admin/questions/addAnswer/$1/$2';
// $route['admin/questions/remove-answer/(:any)'] = 'admin/questions/removeAnswer/$1';
// $route['admin/questions/remove-image/(:any)'] = 'admin/questions/removeImage/$1';
// $route['admin/questions/(:any)'] = 'admin/questions/index/$1';

//Admin Quiz Categories module routes
// $route['admin/quiz-categories'] = 'admin/QuizCategories/listView';
// $route['admin/quiz-categories/data'] = 'admin/QuizCategories/data';
// $route['admin/quiz-categories/create-or-edit'] = 'admin/QuizCategories/createOrEdit/$1';
// $route['admin/quiz-categories/create-or-edit/(:any)'] = 'admin/QuizCategories/createOrEdit/$1';
// $route['admin/quiz-categories/save'] = 'admin/QuizCategories/save';
// $route['admin/quiz-categories/status/(:any)/(:any)'] = 'admin/QuizCategories/changeStatus/$1/$2';
// $route['admin/quiz-categories/bulk-action'] = 'admin/QuizCategories/bulkAction';
// $route['admin/quiz-categories/delete/(:any)'] = 'admin/QuizCategories/delete/$1';

//Admin Quiz routes
// $route['admin/quizes/create-or-edit'] = 'admin/quizes/createOrEdit/$1';
// $route['admin/quizes/create-or-edit/(:any)'] = 'admin/quizes/createOrEdit/$1';
// $route['admin/quizes/save'] = 'admin/quizes/save';
// $route['admin/quizes/clone'] = 'admin/quizes/cloneQuiz';
// $route['admin/quizes/clone/(:any)'] = 'admin/quizes/cloneForm/$1';
// $route['admin/quizes/delete/(:any)'] = 'admin/quizes/delete/$1';
// $route['admin/quizes/dropdown/(:any)'] = 'admin/quizes/dropdown/$1';
// $route['admin/quizes/download/(:any)'] = 'admin/quizes/download/$1';

//Admin Quiz Questions routes
// $route['admin/quiz-questions/add/(:any)/(:any)'] = 'admin/QuizQuestions/add/$1/$2';
// $route['admin/quiz-questions/edit/(:any)'] = 'admin/QuizQuestions/edit/$1';
// $route['admin/quiz-questions/delete/(:any)'] = 'admin/QuizQuestions/delete/$1';
// $route['admin/quiz-questions/order'] = 'admin/QuizQuestions/order';
// $route['admin/quiz-questions/add-answer/(:any)/(:any)'] = 'admin/QuizQuestions/addAnswer/$1/$2';
// $route['admin/quiz-questions/remove-answer/(:any)'] = 'admin/QuizQuestions/removeAnswer/$1';
// $route['admin/quiz-questions/save'] = 'admin/QuizQuestions/save';
// $route['admin/quiz-questions/remove-image/(:any)'] = 'admin/QuizQuestions/removeImage/$1';
// $route['admin/quiz-questions/(:any)'] = 'admin/QuizQuestions/index/$1';

//Admin Interview Categories module routes
// $route['admin/interview-categories'] = 'admin/InterviewCategories/listView';
// $route['admin/interview-categories/data'] = 'admin/InterviewCategories/data';
// $route['admin/interview-categories/create-or-edit'] = 'admin/InterviewCategories/createOrEdit/$1';
// $route['admin/interview-categories/create-or-edit/(:any)'] = 'admin/InterviewCategories/createOrEdit/$1';
// $route['admin/interview-categories/save'] = 'admin/InterviewCategories/save';
// $route['admin/interview-categories/status/(:any)/(:any)'] = 'admin/InterviewCategories/changeStatus/$1/$2';
// $route['admin/interview-categories/bulk-action'] = 'admin/InterviewCategories/bulkAction';
// $route['admin/interview-categories/delete/(:any)'] = 'admin/InterviewCategories/delete/$1';

//Admin Interview routes
// $route['admin/interviews/create-or-edit'] = 'admin/interviews/createOrEdit/$1';
// $route['admin/interviews/create-or-edit/(:any)'] = 'admin/interviews/createOrEdit/$1';
// $route['admin/interviews/save'] = 'admin/interviews/save';
// $route['admin/interviews/clone'] = 'admin/interviews/cloneInterview';
// $route['admin/interviews/clone/(:any)'] = 'admin/interviews/cloneForm/$1';
// $route['admin/interviews/delete/(:any)'] = 'admin/interviews/delete/$1';
// $route['admin/interviews/dropdown/(:any)'] = 'admin/interviews/dropdown/$1';
// $route['admin/interviews/download/(:any)'] = 'admin/interviews/download/$1';

//Admin Interview Questions routes
// $route['admin/interview-questions/add/(:any)/(:any)'] = 'admin/InterviewQuestions/add/$1/$2';
// $route['admin/interview-questions/edit/(:any)'] = 'admin/InterviewQuestions/edit/$1';
// $route['admin/interview-questions/delete/(:any)'] = 'admin/InterviewQuestions/delete/$1';
// $route['admin/interview-questions/order'] = 'admin/InterviewQuestions/order';
// $route['admin/interview-questions/add-answer/(:any)/(:any)'] = 'admin/InterviewQuestions/addAnswer/$1/$2';
// $route['admin/interview-questions/remove-answer/(:any)'] = 'admin/InterviewQuestions/removeAnswer/$1';
// $route['admin/interview-questions/save'] = 'admin/InterviewQuestions/save';
// $route['admin/interview-questions/(:any)'] = 'admin/InterviewQuestions/index/$1';

//Admin Candidate Interviews module routes
// $route['admin/candidate-interviews'] = 'admin/CandidateInterviews/listView';
// $route['admin/candidate-interviews/data'] = 'admin/CandidateInterviews/data';
// $route['admin/candidate-interviews/view-or-conduct/(:any)'] = 'admin/CandidateInterviews/viewOrConduct/$1';
// $route['admin/candidate-interviews/save'] = 'admin/CandidateInterviews/save';

//Admin Quiz Designer Page route
// $route['admin/quiz-designer'] = 'admin/QuizDesigner/index';

//Admin Interview Designer Page route
// $route['admin/interview-designer'] = 'admin/InterviewDesigner/index';

//Admin Job Board routes
$route['admin/job-board'] = 'admin/JobBoard';
$route['admin/job-board/jobs-list'] = 'admin/jobsList';
$route['admin/job-board/candidates-list/(:any)'] = 'admin/candidatesList/$1';
$route['admin/job-board/assign-view/(:any)/(:any)'] = 'admin/assignView/$1/$2';
$route['admin/job-board/assign'] = 'admin/assign';
$route['admin/job-board/delete-interview/(:any)'] = 'admin/deleteInterview/$1';
$route['admin/job-board/delete-quiz/(:any)'] = 'admin/deleteQuiz/$1';
$route['admin/job-board/candidate-status'] = 'admin/candidateStatus';
$route['admin/job-board/delete-app'] = 'admin/deleteApplication';
$route['admin/job-board/job/(:any)'] = 'admin/viewJob/$1';
$route['admin/job-board/resume/(:any)'] = 'admin/viewResume/$1';
$route['admin/job-board/overall-result'] = 'admin/overallResult';
$route['admin/job-board/pdf-result'] = 'admin/pdfResult';
$route['admin/job-board/(:any)'] = 'admin/index/$1';

//Admin Dashboard Routes
// $route['admin/dashboard'] = 'admin/dashboard/index';
// $route['admin/dashboard/popular-jobs-data'] = 'admin/dashboard/popularJobsChartData';
// $route['admin/dashboard/top-candidates-data'] = 'admin/dashboard/topCandidatesChartData';
// $route['admin/dashboard/jobs-list'] = 'admin/dashboard/jobsList';
