# FeatureToggle

The FeatureToggle component laverages the easy to configure and easy to integrate
use of features (i.e. software/project parts) in a php 5.3+ application.

The sole purpose is to easily configure through configuration file or DI
Container/Service Locator enabled/disabled features of an application. Features
can implement a dependency hierarchy, i.e. a feature will be enabled for example
if and only if a dependent, other feature is either en-/or disabled. The control
of features in the view layer is also managed through extensions for different
templating engines.

Next to the simple enabling/disabling of features a time based feature will be
implemented.

The configuration of en-/disabled features is implemented against a dedicated
storage interface so that one can persist the configuration in the filesystem,
a database or a memory based storage engine.